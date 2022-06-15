<?php

namespace CEF\Http\Controllers\project;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectStyleHandler extends Controller
{
    public static function style($project_name,$default_color)
    {
        if(isset($project_name))
        {
            Storage::append("$project_name" . '/css/style.css',
                "body {
     margin-top: 105px; }
   .navbar {
     box-shadow: 2px 2px 5px #2f3738;
     opacity: 1;                   
     background: #$default_color}
  .navbar .nav-item {
     font-size: 1.4rem;
      }
  .footer
     {
     opacity: 1;
     background: #$default_color}
     .navbar .nav-item {
     font-size: 1.4rem;
     }
     ");
        }
        else{
            return "please select a project";
        }

    }
}
