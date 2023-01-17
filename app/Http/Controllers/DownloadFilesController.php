<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFilesController extends Controller
{
    public function download($file)
    {
        return response()->download(storage_path('app/public/uploads/' . $file));
    }
}
