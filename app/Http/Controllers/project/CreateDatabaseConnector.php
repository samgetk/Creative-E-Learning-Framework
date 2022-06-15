<?php

namespace CEF\Http\Controllers\project;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CreateDatabaseConnector extends Controller
{
    public static function create($project_name)
    {
        Storage::append("$project_name".'/includes/database.php',
            '<?php
             $conn = mysqli_connect("localhost","root","",'."'$project_name'".');
             // Check connection
             if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                 }
              ?>');
    }
}
