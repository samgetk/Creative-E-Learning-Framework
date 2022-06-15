<?php

namespace CEF\Http\Controllers\streaming;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class StreamingCreator extends Controller
{
    public static function create($project_name)
    {
        Storage::copy("cef/stream/stream.php","$project_name/stream.php");
    }
}
