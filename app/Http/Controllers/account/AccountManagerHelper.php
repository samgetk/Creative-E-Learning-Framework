<?php

namespace CEF\Http\Controllers\account;

use CEF\Http\Controllers\backend\database\account\AccountHelper;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AccountManagerHelper extends Controller
{
    public static function create_files($project_name,$choice)
    {
        Storage::copy('cef/user/logout.php', "$project_name/logout.php");
        Storage::copy('cef/user/deleteUser.php', "$project_name/deleteUser.php");
        Storage::copy('cef/user/search.php', "$project_name/search.php");
        Storage::copy('cef/user/studentHome.php', "$project_name/studentHome.php");
        Storage::copy('cef/user/teacherHome.php', "$project_name/teacherHome.php");
        Storage::copy('cef/user/studentProfile.php', "$project_name/studentProfile.php");
        Storage::copy('cef/user/admin.php', "$project_name/admin.php");
        Storage::copy('cef/user/users.php', "$project_name/users.php");
        Storage::copy('cef/style/js/searchUser.js', "$project_name/js/searchUser.js");

        if($choice=='admin')
        {
            Storage::copy('cef/user/adminHome.php', "$project_name/adminHome.php");
            Storage::copy('cef/user/admin/login.php', "$project_name/login.php");
        }
        else if($choice=='no_admin')
        {
            Storage::copy('cef/user/no_admin/login.php', "$project_name/login.php");
        }
    }
}
