<?php

use Illuminate\Support\Facades\Route;
use Users\Http\Controllers\HomeController;
use Users\Http\Controllers\LoginController;

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


Route::group(['namespace' => 'Users\Http\Controllers', 'middleware' => 'web' ,'as' => 'user.'], function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

    Route::middleware('auth')->group(function () {

        Route::get('/home', [HomeController::class ,'index'])->name('home');
        Route::get('/logout',[LoginController::class ,'logout'])->name('logout');
    });

});
