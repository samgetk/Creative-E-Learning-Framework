<?php

namespace CEF\Http\Controllers\content;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;

class ContentInfo extends Controller
{
    public static function set_name($id)
    {
        $content_name='';
        $content = DB::table('projects')->where('unique_id', '=', $id)->select('project_name')->get();
        foreach ($content as $check) {
            $content_name = $check->project_name;
        }
        return $content_name;
    }
}
