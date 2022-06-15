<?php

namespace CEF\Http\Controllers;

use CEF\Http\Controllers\content\ContentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CEF\Content;
use DB;

class ContentController extends Controller
{
    public function index(Request $request)
    {

        $id = ProjectController::set_id($request);
        $name=ContentInfo::set_name($id);
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.content')
            ->with('content',$content)
            ->with('recents',$recents);
    }
    public static function contents($message,$project_id)
    {
        $content=new Content;
        $content->name=$message;
        $content->user_id=Auth::user()->id;
        $content->unique_id=$project_id;
        $content->save();
    }
}

