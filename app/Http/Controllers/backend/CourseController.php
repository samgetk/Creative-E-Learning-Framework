<?php

namespace CEF\Http\Controllers\backend;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        return view('backend.course.course');
    }
}
