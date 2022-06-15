<?php

namespace CEF\Http\Controllers;

use CEF\Content;
use CEF\Http\Controllers\account\AccountManagerHelper;
use CEF\Http\Controllers\backend\database\account\AccountHelper;
use CEF\Http\Controllers\backend\database\DatabaseCreator;
use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\content\CheckAvailabilty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use CEF\Recent;
use DB;

class AccountController extends Controller
{
    public function no_admin(Request $request)
    {
        $id=ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        $admin_count=CheckAvailabilty::check('Account manager with administrator',$id);
        $no_admin_count=CheckAvailabilty::check('Account manager without administrator',$id);
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        if(isset($id)) {
            if ($admin_count>0||$no_admin_count>0) {
                return view('backend.account.account')
                    ->with('recents',$recents);
                }
            else {
                RecentsController::recents("You have created User account manager without administrator",$id);
                ContentController::contents("Account manager without administrator", $id);
                AccountHelper::initiate($project_name,'no_admin');
                AccountManagerHelper::create_files($project_name,'no_admin');
                $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                return view('backend.content')
                    ->with('content',$content)
                    ->with('recents',$recents);
            }
        }
        else{
            return view('backend.project')
                ->with('error',"please select a project");
        }
    }
    public function admin(Request $request)
    {
        $id = ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        $admin_count=CheckAvailabilty::check('Account manager with administrator',$id);
        $no_admin_count=CheckAvailabilty::check('Account manager without administrator',$id);
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        if (isset($id)) {
            if ($admin_count >0 || $no_admin_count>0)
            {
                $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
                return view('backend.content')
                    ->with('content',$content)
                    ->with('recents',$recents);
            }
         else {
            RecentsController::recents("You have created User account manager with administrator",$id);
            ContentController::contents("Account manager with administrator", $id);
            AccountHelper::initiate($project_name,'admin');
            AccountManagerHelper::create_files($project_name,'admin');
            $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
            return view('backend.content')
                 ->with('content',$content)
                 ->with('recents',$recents);
            }
        }

        else
            {
                return "please select a project";
            }
    }
}
