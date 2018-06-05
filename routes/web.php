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

Auth::routes();
/**
 * Misc Routes
 */
Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('download/{file}', 'WelcomeController@download')->name('download');
Route::get('/api/info', 'ApiController@apiInfo')->name('api.info');
Route::get('/api/register', 'ApiController@apiRegister')->name('api.register');

/**
 * Demo Routes
 */
Route::get('/demo', 'HomeController@index')->name('demo'); // Instructions
Route::get('/question', 'MainController@index')->name('main');
Route::post('/question/{sentence}/store', 'MainController@store')->name('main.store');

/**
 * Admin
 */
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/sentences', 'AdminController@sentences')->name('admin.sentences');
});

/**
 * Download Excel
 */
Route::group(['middleware' => 'auth'], function() {
    // Data Export
    Route::post('/export', 'AdminController@export')->name('data.export');
});

