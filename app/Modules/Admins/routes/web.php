<?php

use Admins\Http\Controllers\LoginController;
use Admins\Http\Controllers\NewsController;
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


Route::group(['namespace' => 'Admins\Http\Controllers', 'prefix' => 'admin' ,'middleware' => 'web' ,'as' => 'admin.'], function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

    Route::middleware('admin:admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('Admins::dashboard');
        })->name('dashboard');

        Route::resources([
            'categories' => CategoryController::class,
            'news' => NewsController::class
        ]);
        Route::as('news.')->group(function () {
        Route::delete('/trash/{id}' ,[NewsController::class ,'trash'])->name('trash');
        Route::post('/restore/{id}',[NewsController::class ,'restore'])->name('restore');
        });
        Route::post('/logout',[LoginController::class ,'logout'])->name('logout');
    });

});
