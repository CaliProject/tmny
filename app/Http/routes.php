<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@showIndex');

Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@showIndex');
    Route::get('password', 'AdminController@showUpdatePassword');
    Route::patch('password', 'AdminController@updatePassword');

    Route::group([
        'prefix' => 'about'
    ], function () {
        Route::get('/', 'AdminController@showAbout');
        Route::get('{id}', 'AdminController@showEditAbout');
        Route::post('{id}', 'AdminController@editAbout');
        Route::delete('{id}', 'AdminController@deleteAbout');
        Route::get('editAboutHeader', 'AdminController@showAboutHeader');
        Route::get('add', 'AdminController@showAddAbout');
        Route::post('add', 'AdminController@addAbout');
    });
});