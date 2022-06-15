<?php

namespace CEF\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('key');
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.media')
            ->with('recents',$recents);
    }
}

