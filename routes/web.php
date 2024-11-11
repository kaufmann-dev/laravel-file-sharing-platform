<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use \App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\DownloadFilesController;

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
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name("dashboard");
Route::get('/', [CustomAuthController::class, 'index'])->name("index");
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('customauth', [CustomAuthController::class, 'index']);

// Dateien hochladen
Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

// Dateien herunterladen
Route::get('download/{file}', [DownloadFilesController::class, "download"])->name("download");
