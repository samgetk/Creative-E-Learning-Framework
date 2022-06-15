<?php

namespace CEF\Http\Controllers\backend;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;

class ProjectInfo extends Controller
{
    public static function set_name($id)
    {
        $projects=DB::table('projects')->where('unique_id','=',$id)->select('project_name')->get();
        $project_name='';
        $count=0;
        foreach($projects as $project)
        {
            $project_name=$project->project_name;
        }
        return $project_name;
    }
}
