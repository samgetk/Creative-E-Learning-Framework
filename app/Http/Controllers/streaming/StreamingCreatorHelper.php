<?php

namespace CEF\Http\Controllers\streaming;

use CEF\Http\Controllers\content\CheckAvailabilty;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StreamingCreatorHelper extends Controller
{
    public static function create($project_name,$id)
    {
        Storage::append("$project_name/database/db.sql",
        "CREATE TABLE IF NOT EXISTS stream (
         address varchar(400) NOT NULL
         ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
         INSERT INTO stream(address)VALUES('Not Set');
         insert into menu(id,name,link) values(3,'Streaming','Not Set.');
         ");

        $admin=CheckAvailabilty::check("Account manager with administrator",$id);
        $no_admin=CheckAvailabilty::check("Account manager without administrator",$id);
        if($admin>0)
        {
            Storage::append("$project_name/database/db.sql",
                "insert into menu(id,name,link) values(1,'Stream','stream.php');"
            );
        }
        else if($no_admin>0)
        {
            Storage::append("$project_name/database/db.sql",
                "insert into menu(id,name,link) values(2,'Stream','stream.php');"
            );
        }
    }

}
