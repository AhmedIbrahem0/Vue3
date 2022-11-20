<?php

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
//This is Main
 Route::view('/thisiSForLocal','index')->name('index')->where('any','.*');
 Route::view('/mainBranch','index')->name('index')->where('any','.*');
 Route::view('/{any?}','index')->name('index')->where('any','.*');
//This is Main

