<?php

namespace CEF\Http\Controllers;

use CEF\Http\Controllers\backend\database\exam\ExamHelper;
use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\content\CheckAvailabilty;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->session()->get('key');
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.exam')
            ->with('recents',$recents);
    }
    public function exam_Manager(Request $request)
    {
        $id = ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        $count=CheckAvailabilty::check('exam',$id);
        $content = DB::table('contents')->where('unique_id', '=', $id)->select('name')->get();
        if (isset($id)) {
            if ($count>0) {
                return view('backend.content')
                    ->with('error',"You have Already added Exam Manager! No need of adding");
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
                RecentsController::recents('You have added Exam Manager',$id);
                ExamHelper::create($project_name);
                return view('backend.content')
                    ->with('content',$content)
                    ->with('success','Exam Manager Successfully added!');
            }
        }
        else {
            return view('backend.project')
                ->with('error',"Please Select a project!");
        }
    }
}
