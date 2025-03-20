<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DownloadFilesController extends Controller
{
    public function download($file)
    {
        $file = DB::table("files")->where("id", $file)->first();
        $path = storage_path('app/public/uploads/' . $file->name);
        return response()->download($path);
    }

    public function delete($file)
    {
        File::delete(storage_path('app/public/uploads/' . $file));
        DB::table("files")->where("id", $file)->delete();
        return redirect()->back()->with('success', 'File deleted successfully');
    }
}
