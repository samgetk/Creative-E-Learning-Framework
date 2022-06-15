<?php

namespace CEF\Http\Controllers\backend\database;

use CEF\Http\Controllers\backend\ProjectInfo;
use CEF\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;

class DatabaseInitiator extends Controller
{
    public static function initiate($id)
    {
        $id=ProjectController::set_id($id);
        $project_name=ProjectInfo::set_name($id);
        DB::statement("if not exists create database $project_name");
    }
    public function set_database_file(Request $request)
    {
        $project_name=$request->file;
        $headers="header";
        DB::statement("drop database $project_name");
        DB::statement("create database $project_name");
        return Storage::download("$project_name/database/db.sql");
        return view('backend.project');
    }
}
