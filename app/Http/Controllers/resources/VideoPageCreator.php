<?php

namespace CEF\Http\Controllers\resources;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideoPageCreator extends Controller
{
    public static function create($project_name)
    {
        Storage::append("$project_name/choosen_resources.php",
        '<div class="col-lg-4 col-md-6 ml-5">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Videos</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_Videos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Go to Download Page</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>');
        Storage::append("$project_name/uploader.php",
            '<div class="col-lg-4 col-md-6 ml-5">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Video Upload</div>
                                </div>
                            </div>
                        </div>
                        <a href="video.php">
                            <div class="panel-footer">
                                <span class="pull-left">Go to Upload Page</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>');
        Storage::append("$project_name/database/db.sql",
        "--
-- Table structure for table `videos`
    --

CREATE TABLE IF NOT EXISTS videos (
  video_id int(11) NOT NULL,
  title varchar(300) NOT NULL,
  location varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    }
}
