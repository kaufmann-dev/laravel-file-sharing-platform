<?php

use App\Http\Controllers\DownloadFilesController;
use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return redirect("/home")->withSuccess('You are already signed in');
    }
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dateien hochladen
Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

// Dateien herunterladen
Route::get('download/{file}', [DownloadFilesController::class, "download"])->name("download");

// Dateien löschen
Route::get('delete/{file}', [DownloadFilesController::class, "delete"])->name("delete");
