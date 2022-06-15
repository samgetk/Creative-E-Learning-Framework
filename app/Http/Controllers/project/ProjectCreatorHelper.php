<?php

namespace CEF\Http\Controllers\project;

use CEF\Http\Controllers\backend\ProjectInfo;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;

class ProjectCreatorHelper extends Controller
{
    public function slider(Request $request)
    {
        $id = $request->session()->get('key');
        $project_name=ProjectInfo::set_name($id);
        Storage::makeDirectory("$project_name/image/slide");
        $img=$request->slide1;
        $img->storeAs("$project_name/image/slide","slide1.jpg");
        $request->slide2->storeAs("$project_name/image/slide","slide2.jpg");
        $request->slide3->storeAs("$project_name/image/slide","slide3.jpg");
        Storage::copy("cef/home/image/index.php","$project_name/index.php");
        Storage::copy("cef/style/css/jquery.fancybox.css","$project_name/css/jquery.fancybox.css");
        Storage::copy("cef/style/css/jcarousel.css","$project_name/css/jcarousel.css");
        Storage::copy("cef/style/css/flexslider.css","$project_name/css/flexslider.css");
        Storage::copy("cef/style/js/animate.js","$project_name/js/animate.js");
        Storage::copy("cef/style/js/custom.js","$project_name/js/custom.js");
        Storage::copy("cef/style/js/jquery.flexslider.js","$project_name/js/jquery.flexslider.js");
        Storage::copy("cef/style/js/jquery.fancybox.pack.js","$project_name/js/jquery.fancybox.pack.js");
        $recents=DB::table('recents')->where('unique_id', '=', $id)->limit(5)->get();
        return view('backend.account.account')
            ->with('recents',$recents)
            ->with('success','Images Configured Successfully!');
    }

    public static function navigation($project_name,$logo)
    {
        Storage::append("$project_name/database/db.sql",
        'CREATE TABLE menu (
    id int(11) NOT NULL,
    name varchar(50) NOT NULL,
    link varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
create table project(
name varchar(50) NOT NUll,
logo varchar(200) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into project(name,logo) values("'.$project_name.'","'.$logo.'");
');
    }
}
