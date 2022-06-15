<?php

namespace CEF\Http\Controllers\project;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;

class ProjectRemoverHelper extends Controller
{
    public static function drop_records($id)
    {
        DB::table('projects')->where('unique_id',$id)->delete();
        DB::table('contents')->where('unique_id',$id)->delete();
        DB::table('recents')->where('unique_id',$id)->delete();
    }
}
