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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register','Auth_2\RegisterController@register');
Route::post('verifikasi','Auth_2\RegisterController@verifikasi');
Route::post('regenerate','Auth_2\RegisterController@regenerateOtp');
Route::post('password','Auth_2\RegisterController@passwordReset');
Route::post('login','Auth_2\LoginController@login');
Route::post('logout','Auth_2\LogoutController@logout');
Route::get('user','Auth_2\UserController@user');
