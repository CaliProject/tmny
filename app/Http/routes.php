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
    Route::get('updatePassword','AdminController@showUpdatePassword');
    Route::post('updatePassword','AdminController@updatePassword');
    Route::get('about','AdminController@showAbout');
    Route::get('editAbout/{id}','AdminController@showEditAbout');
    Route::post('editAbout/{id}','AdminController@editAbout');
    Route::get('deleteAbout/{id}','AdminController@deleteAbout');
    Route::get('addAbout','AdminController@showAddAbout');
    Route::post('addAbout','AdminController@addAbout');
});