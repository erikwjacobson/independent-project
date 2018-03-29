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

Route::get('/question', 'MainController@index')->name('main');
Route::post('/question/{sentence}/store', 'MainController@store')->name('main.store');

Route::get('/home', 'HomeController@index')->name('home');
