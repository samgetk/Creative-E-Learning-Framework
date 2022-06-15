<?php

namespace CEF\Http\Controllers\backend\database;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CEF\Http\Controllers\Controller;
use DB;

class DatabaseCreator extends Controller
{
    public static function create($project_name)
    {
        DB::statement("create database $project_name;");
    }
}
