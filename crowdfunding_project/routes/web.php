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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['dateMiddleware','auth'])->group(function(){
    Route::get('/tes', 'UserController@tes');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','emailMiddleware'])->group(function(){

    Route::get('/tanpaemail', 'UserController@tanpaemail');
});

Route::middleware(['auth','emailMiddleware','roleMiddleware'])->group(function(){
    Route::get('/tanpaadmin', 'UserController@tanpaadmin');
});

Route::get('/full');
