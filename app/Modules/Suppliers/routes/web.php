<?php

use Suppliers\Http\Controllers\LoginController;
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


Route::group(['namespace' => 'Suppliers\Http\Controllers', 'prefix' => 'supplier' ,'middleware' => 'web' ,'as' => 'supplier.'], function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

    Route::middleware('supplier:supplier')->group(function () {

        Route::get('/dashboard', function () {
            return view('Suppliers::dashboard');
        })->name('dashboard');

        Route::resources([
            'products' => ProductController::class,
        ]);
        
        Route::get('/logout',[LoginController::class ,'logout'])->name('logout');
    });

});
