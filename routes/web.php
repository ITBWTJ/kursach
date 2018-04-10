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

Auth::routes();

Route::get('/code', 'Auth\LoginController@showCodeForm')->name('confirm.form');
Route::get('/confirm', 'Auth\RegisterController@showConfirmForm')->name('confirm.form');
Route::post('/confirm', 'Auth\RegisterController@confirmPhone')->name('confirm.phone');

Route::get('/home', 'HomeController@index')->name('home');
