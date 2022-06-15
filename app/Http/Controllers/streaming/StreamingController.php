<?php

namespace CEF\Http\Controllers\streaming;

use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\content\CheckAvailabilty;
use CEF\Http\Controllers\ContentController;
use CEF\Http\Controllers\RecentsController;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;

class StreamingController extends Controller
{
    public function create(Request $request)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        $count=CheckAvailabilty::check('Streaming',$id);
        if($count>0)
        {
            return view('backend.content')
                ->with('content',$content)
                ->with('error','You have already added Streaming! No need of adding!');
        }
        else{
            StreamingCreator::create($project_name);
            StreamingCreatorHelper::create($project_name,$id);
            ContentController::contents('Streaming',$id);
            RecentsController::recents('Streaming',$id);
            return view('backend.content')
                ->with('content',$content)
                ->with('success','Streaming Successfully added!');
        }
    }
}
