<?php

namespace CEF\Http\Controllers\content;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;

class ContentRemoverHelper extends Controller
{
    public static function remove_content_record($id,$content)
    {
        DB::table('contents')->where('unique_id',$id)->where('name',$content)->delete();
    }
}
