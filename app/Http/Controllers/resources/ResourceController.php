<?php

namespace CEF\Http\Controllers\resources;

use CEF\Http\Controllers\backend\database\resource\ResourceHelper;
use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\content\CheckAvailabilty;
use CEF\Http\Controllers\ContentController;
use CEF\Http\Controllers\ProjectController;
use CEF\Http\Controllers\RecentsController;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('key');
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.resource')
            ->with('recents',$recents);
    }

    public function create(Request $request)
    {
        $id = ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        $count=CheckAvailabilty::check("Document Uploader",$id);
        $resource=CheckAvailabilty::check('resource manager',$id);
        if (isset($id)) {
            if ($count > 0) {
                return view('backend.content')
                    ->with('error',"You have Already added Document Manager! No need of adding");
            } else
                {
                    ResourcePageCreator::create_files($request);
                }

            if($resource>0)
            {
                $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                return view('backend.content')
                    ->with('recents',$recents)
                    ->with('success','Resource Manager Successfully added!');
            }
            else
            {
                Storage::copy('cef/resource/choosen_resources.php', "$project_name/choosen_resources.php");
                Storage::copy('cef/resource/resources.php', "$project_name/resources.php");
                ContentController::contents("resource manager",$id);
            }
        }
        else {
            return view('backend.project')
                ->with('error','Please Select Project!');
        }
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.content')
            ->with('recents',$recents)
            ->with('success','Resource Manager Successfully added!');
    }

    public function audio(Request $request)
    {
        $id = ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        $count=CheckAvailabilty::check('audio manager',$id);
        $resource=CheckAvailabilty::check('resource manager',$id);
        if (isset($id)) {
            if ($count>0) {
                return view('backend.content')
                    ->with('error',"You have Already added Audio Manager! No need of adding");
            } else {
                Storage::makeDirectory("$project_name".'/Audio');
                Storage::copy('cef/resource/audio/audio.php', "$project_name/audio.php");
                ContentController::contents("audio manager",$id);
                RecentsController::recents('You have added Audio Manager',$id);
                ResourceHelper::create($id,$project_name);
                if($resource>0)
                {
                    $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                    return view('backend.content')
                        ->with('recents',$recents);
                }
                else
                {
                    Storage::copy('cef/resource/choosen_resources.php', "$project_name/choosen_resources.php");
                    Storage::copy('cef/resource/resources.php', "$project_name/resources.php");
                    ContentController::contents("resource manager",$id);
                }
            }
        }
        else {
            return view('backend.project')
                ->with('error','Please Select Project!');
        }
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.content')
            ->with('recents',$recents)
            ->with('success','Audio Manager Successfully added!');

    }

    public function video(Request $request)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        $count=CheckAvailabilty::check('video manager',$id);
        $resource=CheckAvailabilty::check('resource manager',$id);
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        if (isset($id)) {
            if ($count>0) {
                return view('backend.content')
                    ->with('error',"You have Already added Video Manager! No need of adding");
            } else {
                Storage::makeDirectory("$project_name".'/upload');
                Storage::copy('cef/resource/video/video.php', "$project_name/video.php");
                Storage::copy('cef/resource/video/view_Videos.php', "$project_name/view_Videos.php");
                ContentController::contents("video manager",$id);
                RecentsController::recents('You have added Video Manager',$id);
                ResourceHelper::create($id,$project_name);
                VideoPageCreator::create($project_name);
                if($resource>0)
                {
                    $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                    return view('backend.content')
                        ->with('recents',$recents)
                        ->with('success','Video Manager Successfully added!');
                }
                else
                {
                    Storage::copy('cef/resource/resources.php', "$project_name/resources.php");
                    ContentController::contents("resource manager",$id);
                }
                return view('backend.content')
                    ->with('content',$content)
                    ->with('recents',$recents)
                    ->with('success','Video Manager Successfully added!');
            }
        }
        else {
            return view('backend.project')
                ->with('error','Please Select Project!');
        }
    }
}
