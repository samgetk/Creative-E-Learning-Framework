<?php

namespace CEF\Http\Controllers;
use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\content\CheckAvailabilty;
use CEF\Http\Controllers\project\CreateDatabaseConnector;
use CEF\Http\Controllers\project\ProjectCreator;
use CEF\Http\Controllers\project\ProjectCreatorHelper;
use CEF\Http\Controllers\project\ProjectStyleHandler;
use CEF\Http\Requests\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use CEF\Project;
use CEF\Http\Controllers\content\ContentInfo;
use DB;

class ProjectController extends Controller
{
    function getChoice(Validator $request)
    {
        $choice=$request->layout_choice;
        if($choice=='custom')
        {
            $id = $request->session()->get('key');
            $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();

            $name = DB::table('projects')->select('project_name')->get();
            foreach ($name as $names) {
                $p_name = $names->project_name;
                if ($request->project_name == $p_name) {
                    return view('backend.project')
                        ->with('error', 'Project name already exists! Please insert another!');
                }
            }
            $this->insert($request);
                return view('backend.project.project')
                    ->with('recents',$recents)
                    ->with('success','Project Created Successfully!');
        }
        else
        {
            return view('backend.layouts.theme');
        }
    }
    //inserts information about the project to the database
    function insert(Validator $request)
    {
        $project=new Project;
        Storage::makeDirectory("$request->project_name/image");
        $request->logo->storeAs("$request->project_name/image","logo.jpg");
        $project_name=$request->project_name;
        $project->project_name=$request->project_name;
        $project->institution_name=$request->institution_name;
        $project->choice=$request->layout_choice;
        $project->logo=$request->logo;
        $id=$project->user_id=Auth::user()->id;
        $project_id=$project->unique_id=uniqid();
        $project->save();
        $file=$request->file('logo');
        $filename=$file->getClientOriginalExtension();
        //passing data to RecentsController
        RecentsController::recents("You have Created new project",$project_id);
        //creating the database.php file which facilitates connection with database for the created project
        CreateDatabaseConnector::create($project_name);
        ProjectCreator::create_project_structure($project_name,"logo.$filename");
        $request->session()->put('key', $project_id);
    }

    public function index(Request $request)
    {
        $id = $request->session()->get('key');
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        $project=Auth::user()->project;
        return view('backend.project')
            ->with('project',$project)
            ->with('recents',$recents);
    }

    public function open(Request $request)
    {
       $id=$request->id;
       $request->session()->put('key', $id);
       $count=CheckAvailabilty::check('home',$id);
       $name=ContentInfo::set_name($id);
       $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
       $home=CheckAvailabilty::check('home',$id);
       $account_with_admin=CheckAvailabilty::check('Account manager without administrator',$id);
       $account_no_admin=CheckAvailabilty::check('Account manager with administrator',$id);
       if($home>0)
       {
           if($account_no_admin>0 || $account_with_admin>0)
           {
               $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
               return view('backend.content')
                   ->with('content',$content)
                   ->with('recents',$recents);
           }
           else
           {
               $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
               return view('backend.account.account')
                   ->with('recents',$recents);
           }
       }
       else
       {
           $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
           return view('backend.project.project')
               ->with('content',$content)
               ->with('recents',$recents);
       }
    }

    public static function set_id(Request $request)
    {
        $id = $request->session()->get('key');
        return $id;
    }

    public function homepage(Request $request)
    {
        $id = $request->session()->get('key');
        $menu = $request->menu_layout_choice;
        $choice = $request->home_layout_choice;
        $default_color = $request->color_choice;
        $project_name=ProjectInfo::set_name($id);
        ProjectStyleHandler::style($project_name,$default_color);
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        $account_with_admin=CheckAvailabilty::check('Account manager without administrator',$id);
        $account_no_admin=CheckAvailabilty::check('Account manager with administrator',$id);
        ContentController::contents("home",$id);
        if($choice=='image')
        {
            if($account_no_admin>0 || $account_with_admin>0)
            {
                $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                return view('backend.content')
                    ->with('content',$content)
                    ->with('recents',$recents);
            }
            else
            {
                $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                return view('backend.project.slider')
                    ->with('recents',$recents)
                    ->with('success','HomePage Design Created Successfully!');
            }
        }

        else if($choice=='login')
        {
            if($account_no_admin>0 || $account_with_admin>0)
            {
                $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                return view('backend.content')
                    ->with('content',$content)
                    ->with('recents',$recents);
            }
            else
            {
                Storage::copy('cef/home/login/index.php', "$project_name/index.php");
                $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                return view('backend.account.account')
                    ->with('recents',$recents)
                    ->with('success','HomePage Design Created Successfully!');
            }
        }
    }
}
