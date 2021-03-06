<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('register', function () {
    return view('register');
})->name('register');
Route::post('register', [AccountController::class, 'create'])->name('createAccount');
Route::get('lostpw', function () {
    return view('lostpw');
})->name('lostpw');
Route::post('lostpw', [AccountController::class, 'resetPassword'])->name('resetPassword');
Route::get('ranking', [PlayerController::class, 'ranking'])->name('ranking');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['de', 'en'])) {
        abort(400);
    }
    
    Cookie::queue('lang', $locale, 60*60*24*365);
    App::setLocale($locale);
    return Redirect('home');
});

Route::get('verify/{id}/{hash}', [AccountController::class, 'verifyEmail'])->name('verify');
Route::group(['middleware' => 'auth'], function () {
    Route::get('password', function () {
        return view('password');
    })->name('password');
    Route::post('password', [AccountController::class, 'changePassword']);
});