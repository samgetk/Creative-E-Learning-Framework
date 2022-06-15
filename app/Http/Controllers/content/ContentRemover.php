<?php

namespace CEF\Http\Controllers\content;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentRemover extends Controller
{
    public static function account_remover($project_name)
    {
        Storage::delete("$project_name/login.php");
        Storage::delete("$project_name/logout.php");
        Storage::delete("$project_name/deleteUser.php");
        Storage::delete("$project_name/search.php");
        Storage::delete("$project_name/studentHome.php");
        Storage::delete("$project_name/teacherHome.php");
        Storage::delete("$project_name/studentProfile.php");
        Storage::delete("$project_name/js/searchUser.js");
        Storage::delete("$project_name/admin.php");
        Storage::delete("$project_name/users.php");
    }

    public static function exam_remover($project_name)
    {
        Storage::delete("$project_name/adminHomeContent.php");
        Storage::delete("$project_name/adminHomeExam.php");
        Storage::delete("$project_name/editTest.php");
        Storage::delete("$project_name/evaluateTest.php");
        Storage::delete("$project_name/showResult.php");
        Storage::delete("$project_name/solveTest.php");
        Storage::delete("$project_name/studentHomeExam.php");
        Storage::delete("$project_name/js/solveTest.js");
    }

    public static function home_remover($project_name)
    {
        Storage::delete("$project_name/index.php");
        Storage::delete("$project_name/css/style.css");
    }

    public static function stream_remover($project_name)
    {
        Storage::delete("$project_name/stream.php");
    }

    public static function video_remover($project_name)
    {
        Storage::delete("$project_name/video.php");
        Storage::delete("$project_name/view_Videos.php");
        Storage::delete("$project_name/resources.php");
    }

    public static function audio_remover($project_name)
    {
        Storage::delete("$project_name/audio.php");
        Storage::delete("$project_name/choosen_resources.php");
        Storage::delete("$project_name/resources.php");
    }

}
