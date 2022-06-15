<?php

namespace CEF\Http\Controllers\backend;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;

class CodeEditor extends Controller
{
    public function page()
    {
        return view('backend.pages');
    }
}
