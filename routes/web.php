<?php
use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\CustomAuthController;
/*
 * use App\Http\Controllers\InvoiceController; // InvoiceController is controller name

Route::get('invoice',[InvoiceController::class, 'index']);
 * */

use \App\Http\Controllers\CustomAuthController;
Route::get('customauth', [CustomAuthController::class, 'index']);

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


Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
