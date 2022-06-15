<?php

namespace CEF\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserGuide extends Controller
{
    public function user_guide()
    {
        return Storage::download("cef/guide/CEF v.0.8 user guide.pdf");
        return view('welcome');
    }
}
