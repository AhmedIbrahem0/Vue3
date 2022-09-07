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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response(auth()->user());
});
//Route::post('/login','LoginController@login');
//Route::post('/register','LoginController@register');
//Route::post('/logout','LoginController@logout');
Route::apiResource('/posts',\App\Http\Controllers\PostController::class);
Route::apiResource('/categories',\App\Http\Controllers\CategoryController::class);
