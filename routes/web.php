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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('api/users', 'UserController');

Route::post('api/users/signup', 'UserController@signup');

Route::post('api/users/signin', 'UserController@signin');

Route::resource('api/shopping', 'ShoppingController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
