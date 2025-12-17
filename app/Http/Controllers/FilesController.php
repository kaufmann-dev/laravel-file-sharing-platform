<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FileStorage;
use Illuminate\Support\Facades\DB;
use App\Models\UserHasFiles;
use App\Models\User;
use App\Models\File;

class FilesController extends Controller
{
    public function download($id)
    {
        $file = DB::table("files")->where("id", $id)->first();
        $path = storage_path('app/public/uploads/' . $file->name);
        return response()->download($path);
    }

    public function delete($id)
    {
        FileStorage::delete(storage_path('app/public/uploads/' . $id));
        DB::table("files")->where("id", $id)->delete();
        return redirect()->back()->with('success', 'File deleted successfully');
    }

    public function share($id)
    {
        $email = request()->get("email");
        UserHasFiles::create([
            'FILE_ID' => File::where("id", $id)->first()->id,
            'USER_ID' => User::where("email", $email)->first()->id
        ]);
    }
}
