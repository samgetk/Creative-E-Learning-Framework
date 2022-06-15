<?php

namespace CEF\Http\Controllers\pages;

use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\ProjectController;
use CEF\Http\Requests\PageValidator;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;

class PageCreator extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('key');
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.pages')
            ->with('recents',$recents);
    }
    public  function page(PageValidator $request)
    {
        $id=ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        $name=$request->page_name;
        $page_content= $request->page_content;
        if(isset($project_name))
        {
            Storage::append("$project_name/$name.php",$page_content);
            PageCreatorHelper::creator_helper($id,$name);
        }
        else{
            return 'please select a project';
        }


        return view('backend.pages');
    }
}
