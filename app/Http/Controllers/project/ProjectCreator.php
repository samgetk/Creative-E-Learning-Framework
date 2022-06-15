<?php

namespace CEF\Http\Controllers\project;

use CEF\Http\Controllers\backend\database\DatabaseCreator;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectCreator extends Controller
{
    public static function create_project_structure($project_name,$logo)
    {
        Storage::makeDirectory("$project_name".'/includes');
        Storage::copy("cef/home/includes/menu.php","$project_name/includes/menu.php");
        Storage::copy("cef/home/includes/admin_menu.php","$project_name/includes/admin_menu.php");
        Storage::copy("cef/home/includes/teachers_menu.php","$project_name/includes/teachers_menu.php");
        Storage::copy("cef/home/includes/students_menu.php","$project_name/includes/students_menu.php");
        Storage::copy("cef/home/includes/footer.php","$project_name/includes/footer.php");
        Storage::copy("cef/style/css/bootstrap.css","$project_name/css/bootstrap.css");
        Storage::copy("cef/style/css/bootstrap.min.css","$project_name/css/bootstrap.min.css");
        Storage::copy("cef/style/css/stylesheet.css","$project_name/css/stylesheet.css");
        Storage::copy("cef/style/css/main-style.css","$project_name/css/main-style.css");
        Storage::copy("cef/style/css/font-awesome.min.css","$project_name/css/font-awesome.min.css");
        Storage::copy("cef/style/js/jquery.min.js","$project_name/js/jquery.min.js");
        Storage::copy("cef/style/js/bootstrap.js","$project_name/js/bootstrap.js");
        Storage::copy("cef/style/js/bootstrap.min.js","$project_name/js/bootstrap.min.js");
        Storage::copy("cef/style/fonts/fontawesome-webfont.woff","$project_name/fonts/fontawesome-webfont.woff");
        DatabaseCreator::create($project_name);
        ProjectCreatorHelper::navigation($project_name,$logo);

    }
}
