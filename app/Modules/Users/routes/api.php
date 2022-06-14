<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Users\Http\Controllers\Api\HomeController;
use Users\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::group(['namespace' => 'Users\Http\Controllers\Api'], function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'login']);
    });

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/home', [HomeController::class ,'index']);
        Route::get('/logout',[LoginController::class ,'logout']);
    });

});
