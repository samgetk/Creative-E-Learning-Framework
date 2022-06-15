<?php

namespace CEF\Http\Controllers\pages;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;

class PagesInitiator extends Controller
{
    public static function get_pages($id)
    {
        $projects=DB::table('pages')->where('id','=',$id)->select('name')->get();
        return $projects;
    }
}
