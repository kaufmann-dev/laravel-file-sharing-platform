<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\UserHasFiles;

class FileUpload extends Controller
{
    public function createForm(){
        return view('file-upload');
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|max:8192'
        ]);

        $fileModel = new File;
        $userHasFilesModel = new UserHasFiles;

        if($req->file()) {
            $fileName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $req->file->getClientOriginalName();
            $fileModel->user_id = auth()->user()->id;
            $fileModel->file_path = '/storage/app/public/' . $filePath;
            $fileModel->file_size = $req->file->getSize();
            $fileModel->save();

            $userHasFilesModel->create([
                'USER_ID' => auth()->user()->id,
                'FILE_ID' => $fileModel->id
            ]);

            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }
}
