<?php

use App\User;
use Illuminate\Http\Request;

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


Route::group(['middleware' => 'auth', 'prefix' => 'api/v1'], function() {
    // Sentence
    Route::get('/sentences', 'api/v1/SentenceController@index')->name('api.v1.sentence.index');

    // Records
    Route::get('/records', 'api/v1/RecordController@index')->name('api.v1.records.index');

    // User
    Route::get('/user/{id}/records', 'api/v1/UserController@records')->name('api.v1.user.records');

    // Style
    Route::get('/styles', 'api/v1/StyleController@index')->name('api.v1.style.index');

    // Emotion
    Route::get('/emotions', 'api/v1/EmotionController@index')->name('api.v1.emotion.index');
});
