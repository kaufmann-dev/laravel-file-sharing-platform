<?php
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\CustomAuthController;
Route::get('customauth', [CustomAuthController::class, 'index']);

use \App\Http\Controllers\FileUploadController;
Route::get('file/upload', [FileUploadController::class, 'create']);


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

// Registration/Login/Logout
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// FileUploading
Route::get('file/upload', [FileUploadController::class, 'create'])->name('file.create');
Route::get('file/upload', [FileUploadController::class, 'store'])->name('file.store');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
