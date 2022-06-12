<?php

use Admins\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'Admins\Http\Controllers', 'prefix' => 'admin' ,'middleware' => 'web'], function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

    Route::middleware('admin.auth')->group(function () {

        Route::get('/dashboard', function () {
            return view('Admins::dashboard');
        })->name('dashboard');

        Route::resources([
            'categories' => CategoryController::class,
        ]);
        
        Route::get('/logout',[LoginController::class ,'logout'])->name('logout');
    });

});
