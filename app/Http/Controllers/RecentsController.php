<?php

namespace CEF\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use CEF\Recent;
use DB;

class RecentsController extends Controller
{

    public function index()
    {

        $project=Auth::user()->project;
        $status=Auth::user()->recent;
        return view('backend.recents')
            ->with('status',$status)
            ->with('project',$project);
    }

    public static function recents($message,$id)
    {

        $recent=new Recent;
        $recent->action=$message;
        $recent->status='not checked';
        $recent->user_id=Auth::user()->id;
        $recent->unique_id=$id;
        $recent->save();
    }

    public static function remove(Request $request)
    {
        $id=Auth::user()->id;
        DB::table('recents')->where('user_id',$id)->delete();
    }
}
