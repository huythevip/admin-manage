<?php

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

Route::get('/home', 'PagesController@home');

//Authentication routes:
Route::get('login', 'AuthController@showLoginForm')->name('login.get');
Route::get('register', 'AuthController@showRegistrationForm')->name('register.get');
Route::post('register', 'AuthController@register');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::post('login', 'LoginController@login');
