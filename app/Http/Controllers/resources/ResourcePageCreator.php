<?php

namespace CEF\Http\Controllers\resources;

use CEF\Http\Controllers\backend\database\resource\ResourceHelper;
use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\content\CheckAvailabilty;
use CEF\Http\Controllers\ContentController;
use CEF\Http\Controllers\ProjectController;
use CEF\Http\Controllers\RecentsController;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;

class ResourcePageCreator extends Controller
{
    public static function create_files(Request $request)
    {
        $id = ProjectController::set_id($request);
        $project_name=ProjectInfo::set_name($id);
        Storage::makeDirectory("$project_name".'/documents');
        Storage::copy('cef/resource/file/download.php', "$project_name/download.php");
        Storage::copy('cef/resource/file/document_uploader.php', "$project_name/document_uploader.php");
        Storage::copy('cef/resource/file/document.php', "$project_name/document.php");
        Storage::copy('cef/resource/upload.php', "$project_name/upload.php");
        Storage::copy('cef/resource/uploaders.php', "$project_name/uploaders.php");
        Storage::copy('cef/style/css/DT_bootstrap.css', "$project_name/css/DT_bootstrap.css");
        Storage::copy('cef/style/js/DT_bootstrap.js', "$project_name/js/DT_bootstrap.js");
        Storage::copy('cef/style/js/jquery.dataTables.js', "$project_name/css/jquery.dataTables.js");
        ContentController::contents("Document Uploader",$id);
        RecentsController::recents('You have added Resource Manager',$id);
    }
}
