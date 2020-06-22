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


Route::post('singup', 'AuthController@singUp')->middleware('guest');
Route::post('singin', 'AuthController@singIn')->middleware('guest');

Route::apiResource('product', 'ProductController')->middleware('auth:api');
