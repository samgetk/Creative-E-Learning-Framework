<?php

namespace CEF\Http\Controllers\backend;

use CEF\Http\Controllers\content\CheckAvailabilty;
use CEF\Http\Controllers\ContentController;
use CEF\Http\Controllers\ProjectController;
use CEF\Http\Controllers\RecentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;

class ExamController extends Controller
{
    public function index()
    {
        return view('backend.exam');
    }
    public function exam_Manager(Request $request)
    {
        $id = ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        $count=CheckAvailabilty::check('exam',$id);
        if (isset($id)) {
            if ($count>0) {
                return "no need of adding";
            } else {
                Storage::copy('cef/exam/adminHomeContent.php', "$project_name/adminHomeContent.php");
                Storage::copy('cef/exam/adminHomeExam.php', "$project_name/adminHomeExam.php");
                Storage::copy('cef/exam/editTest.php', "$project_name/editTest.php");
                Storage::copy('cef/exam/evaluateTest.php', "$project_name/evaluateTest.php");
                Storage::copy('cef/exam/showResult.php', "$project_name/showResult.php");
                Storage::copy('cef/exam/solveTest.php', "$project_name/solveTest.php");
                Storage::copy('cef/exam/studentHomeExam.php', "$project_name/studentHomeExam.php");
                Storage::copy('cef/exam/viewProfile.php', "$project_name/viewProfile.php");
                Storage::copy('cef/style/js/solveTest.js', "$project_name/js/solveTest.js");
                ContentController::contents("exam",$id);
                RecentsController::recents('You have added exam Manager');
            }
        }
        else {
            return "Please select a project";
        }
    }
}
