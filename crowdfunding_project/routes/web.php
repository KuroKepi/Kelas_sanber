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

Route::get('/test', 'TestController@test')->middleware('dateMiddleware');
Route::middleware(['auth','email_verified','admin'])->group(function(){
    Route::get('/admin', 'UserController@admin');
});
Route::middleware(['auth','email_verified'])->group(function(){
    Route::get('/user', 'UserController@user');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
