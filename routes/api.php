<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/v1/login', "api\UserController@login");

    // api com autenticação
    Route::prefix('v1')->middleware(['auth:sanctum'])
        ->group(function ()
        {
            Route::get('/users', "api\UserController@index");
            Route::get('/user/{id}', "api\UserController@find");
        });
