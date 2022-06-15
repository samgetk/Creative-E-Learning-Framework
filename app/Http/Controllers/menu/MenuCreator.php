<?php

namespace CEF\Http\Controllers\menu;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;

class MenuCreator extends Controller
{
    public function create(Request $request)
    {
        $menu_name=$request->menu_name;
        $menu_choice=$request->menu_choice;
        $link=$request->link_to;
        if($menu_choice=='Guest Home')
        {
            MenuCreatorHelper::guest($request,$menu_name,$link);
            return view('backend.menu');
        }
        elseif($menu_choice=='Administrator Home')
        {
            MenuCreatorHelper::admin($request,$menu_name,$link);
            return view('backend.menu');

        }
        elseif($menu_choice=='Student Home')
        {
            MenuCreatorHelper::student($request,$menu_name,$link);
            return view('backend.menu');
        }
        else if($menu_choice=='Teachers Home')
        {
            MenuCreatorHelper::instructor($request,$menu_name,$link);
            return view('backend.menu');
        }
        else
        {
            return 'please choose menu for:';
        }
    }
}
