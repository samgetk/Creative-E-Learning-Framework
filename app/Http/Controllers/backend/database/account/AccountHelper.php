<?php

namespace CEF\Http\Controllers\backend\database\account;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use DB;

class AccountHelper extends Controller
{
    public static function create($project_name,$user_type)
    {
        Storage::append("$project_name/database/db.sql",
        ".insert into menu(id,name,link) values(0,'Login','login.php');"
            );
        if($user_type=='admin')
        {

        }
        elseif ($user_type=='no_admin')
        {

        }
    }

    public static function initiate($project_name,$type)
    {
        Storage::append("$project_name/database/db.sql",
            "CREATE TABLE admin_users (
            user_id int(11) NOT NULL,
            username varchar(20) NOT NULL,
            password varchar(200) NOT NULL,
            role varchar(200) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            INSERT INTO admin_users (user_id, username, password, role) VALUES
            (1, 'admin', 'admin', 'administrator');
            CREATE TABLE users (
            user_id int(11) NOT NULL,
            username varchar(200) NOT NULL,
            email varchar(200) NOT NULL,
            password varchar(200) NOT NULL,
            user_type int(11) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            --
-- Indexes for table `admin_users`
--
ALTER TABLE admin_users
  ADD PRIMARY KEY (user_id);

  
--
-- Indexes for table `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (user_id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE admin_users
  MODIFY user_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE users
  MODIFY user_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
        ");

        if($type=='admin')
        {
            Storage::append("$project_name/database/db.sql",
                "insert into menu(id,name,link) values(1,'Users','users.php');"
            );
        }
        elseif ($type=='no_admin')
        {
            Storage::append("$project_name/database/db.sql",
                "insert into menu(id,name,link) values(2,'Users','users.php');"
            );
        }
    }
}
