<?php

namespace CEF\Http\Controllers\pages;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;
use CEF\Page;

class PageCreatorHelper extends Controller
{
    public static function creator_helper($id,$name)
    {
        $pages=new Page;
        $pages->id=$id;
        $pages->name=$name;
        $pages->save();
    }


}
