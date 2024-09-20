<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'index'])->name('front.home');
Route::group(['account'], function(){
    // Guest Routes
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/account/register', [AccountController::class, 'register'])->name('account.register');
        Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/account/register-process' ,[AccountController::class, 'registerProccess'])->name('account.registerProccess');
        Route::post('/account/login-process',[AccountController::class, 'loginProccess'])->name('account.loginProccess');
    });

    //Authenticated Routes
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/account/profile',[AccountController::class, 'profile'])->name('account.profile');
        Route::get('/account/logout',[AccountController::class, 'logout'])->name('account.logout');
    });
});
