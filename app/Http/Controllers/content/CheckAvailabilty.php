<?php

namespace CEF\Http\Controllers\content;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;

class CheckAvailabilty extends Controller
{
    public static function check($content,$id)
    {
        $content_name='';
        $count=0;
        $checks = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        foreach ($checks as $check) {
            $content_name = $check->name;
            if($content_name==$content)
            {
                $count++;
            }
        }
        return $count;
    }
}
