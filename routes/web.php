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

Route::group(['middleware' => 'auth'], function() {

    // Practice
    Route::get('/practice', 'MainController@practice')->name('practice');
    Route::post('/practice', 'MainController@practiceStore')->name('practice.store');

    // Main
    Route::get('/home', 'HomeController@home')->name('home'); // First Instruction
    Route::get('/instructions', 'HomeController@instructions')->name('instructions'); // Second Instruction
    Route::get('/question', 'MainController@index')->name('main'); // Main Questions
    Route::get('/break', 'MainController@break')->name('break'); // Break page
    Route::post('/question/{sentence}/store', 'MainController@store')->name('main.store');

    // Demographic Questions
    Route::get('/demographics', 'UserController@demographics')->name('demographics');
    Route::post('/demographics', 'UserController@store')->name('demographics.store');

    // End
    Route::get('/end', 'MainController@end')->name('end');

    // Administrator Pages
    Route::group(['middleware' => 'admin'], function() {
        Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/admin/sentences', 'AdminController@sentences')->name('admin.sentences');
        Route::post('/admin/export', 'AdminController@export')->name('admin.export');
    });
});

