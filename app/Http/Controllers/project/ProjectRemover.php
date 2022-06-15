<?php

namespace CEF\Http\Controllers\project;

use CEF\Http\Controllers\backend\ProjectInfo;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class ProjectRemover extends Controller
{
    public static function delete(Request $request)
    {
        $id=$request->id;
        $project_name=ProjectInfo::set_name($id);
        //deleting the created folders
        Storage::deleteDirectory($project_name);
        ProjectRemoverHelper::drop_records($id);
        $project=Auth::user()->project;
        DB::statement("drop database $project_name");
        return view('backend.project')
            ->with('project',$project);
    }
}
