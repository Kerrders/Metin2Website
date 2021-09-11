<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/register', function () {
    return view('register');
});
Route::get('/ranking', [PlayerController::class, 'ranking'])->name('ranking');

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['de', 'en'])) {
        abort(400);
    }

    App::setLocale($locale);
});