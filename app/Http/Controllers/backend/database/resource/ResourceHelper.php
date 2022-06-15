<?php

namespace CEF\Http\Controllers\backend\database\resource;

use CEF\Http\Controllers\content\CheckAvailabilty;
use CEF\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResourceHelper extends Controller
{
    public static function create($id,$project_name)
    {
        $count=CheckAvailabilty::check('uploader page',$id);
        Storage::append("$project_name/database/db.sql",
            "CREATE TABLE IF NOT EXISTS uploaded (
  id int(100) NOT NULL,
  name varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

            
");
        if($count==0)
        {
            Storage::append("$project_name/database/db.sql",
                "insert into menu(id,name,link) values(3,'Resource','resources.php');
insert into menu(id,name,link) values(2,'Resource','upload.php');

--
-- Indexes for table `uploaded`
--
ALTER TABLE uploaded
  ADD PRIMARY KEY (id);
  
--
-- AUTO_INCREMENT for table `uploaded`
--
ALTER TABLE uploaded
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;");

            ContentController::contents("uploader page",$id);

        }
        Storage::append("$project_name/database/db.sql",
            "CREATE TABLE IF NOT EXISTS uploaded (
  id int(100) NOT NULL,
  name varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

            
");
    }

    public static function video($projetc_name)
    {

    }


}
