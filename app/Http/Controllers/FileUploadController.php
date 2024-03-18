<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{
    public function create()

    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate(['file' => 'required|mimes:doc,docx,xlx,csv,pdf|max:1024']);

        $file_name = time().'.'.$request->file->extension();

        $request->file->move(public_path('file uploads'), $file_name);

        return back()
            ->with('success','Successfully uploaded a file!')
            ->with('file',$file_name);
    }
}
