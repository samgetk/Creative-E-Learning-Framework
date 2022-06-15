<?php

namespace CEF\Http\Controllers;

use CEF\Http\Controllers\pages\PagesInitiator;
use Illuminate\Http\Request;
use DB;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('key');
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        $menu=PagesInitiator::get_pages($id);
        return view('backend.menu')
            ->with('menu',$menu)
            ->with('recents',$recents);
    }
}
