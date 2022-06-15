<?php

namespace CEF\Http\Controllers\project;

use Illuminate\Http\Request;
use CEF\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class ProjectExportHandler extends Controller
{
    public function export(Request $request)
    {
        $project_name=$request->id;
        // Get real path for our folder
        $directory=storage_path("app/$project_name");

// Initialize archive object
        $zip = new ZipArchive();
        $zip->open(storage_path("app/$project_name.zip"), ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen("$directory") + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

// Zip archive will be created only after closing object
        $zip->close();
        return Storage::download("$project_name.zip");
        return Storage::download("$project_name.zip", $project_name, $headers);

    }
}
