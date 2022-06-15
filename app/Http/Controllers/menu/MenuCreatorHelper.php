<?php

namespace CEF\Http\Controllers\menu;

use CEF\Http\Controllers\backend\ProjectInfo;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuCreatorHelper extends Controller
{
    public static function guest(Request $request,$menu_name,$link)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        Storage::append("$project_name/database/db.sql",
            "insert into menu(id,name,link) values(0,'$menu_name','$link.php');"
        );
    }
    public static function admin(Request $request,$menu_name,$link)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        Storage::append("$project_name/database/db.sql",
            "insert into menu(id,name,link) values(1,'$menu_name','$link.php');"
        );
    }
    public static function instructor(Request $request,$menu_name,$link)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        Storage::append("$project_name/database/db.sql",
            "insert into menu(id,name,link) values(2,'$menu_name','$link.php');"
        );
    }
    public static function student(Request $request,$menu_name,$link)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        Storage::append("$project_name/database/db.sql",
            "insert into menu(id,name,link) values(3,'$menu_name','$link.php');"
        );
    }
}
