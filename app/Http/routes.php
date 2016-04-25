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

Route::get('page/about', 'HomeController@showAbout');
Route::get('page/services', 'HomeController@showServices');
Route::get('page/portfolio', 'HomeController@showPortfolio');
Route::get('page/blog', 'HomeController@showBlog');
Route::get('page/basement', 'HomeController@showBasement');
Route::get('page/contact', 'HomeController@showContact');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@showIndex');
    Route::get('password', 'AdminController@showUpdatePassword');
    Route::patch('password', 'AdminController@updatePassword');

    // About routes.
    Route::group(['prefix' => 'about'], function () {
        Route::get('/', 'AdminController@showAbout');
        Route::get('edit', 'AdminController@showEditAbout');
        Route::patch('{id}', 'AdminController@editAbout');
        Route::delete('{id}', 'AdminController@deleteAbout');
        Route::get('add', 'AdminController@showAddAbout');
        Route::post('add', 'AdminController@addAbout');
    });
    
    // Services routes.
    Route::group(['prefix' => 'services'],function () {
        Route::get('{operation}','AdminController@showServices');
        Route::post('add','AdminController@addServices');
        Route::patch('{id}','AdminController@editServices');
        Route::delete('{id}','AdminController@deleteServices');
    });
    
    // Basement routes.
    Route::group(['prefix' => 'basement'], function () {
        Route::get('/', 'AdminController@showBasement');
        Route::post('/', 'AdminController@saveBasement');
    });
    
    // Blog routes.
    Route::group(['prefix' => 'blog'], function () {
        Route::get('{operation}', 'AdminController@showBlog');
        Route::post('add', 'AdminController@addBlog');
        Route::patch('{id}', 'AdminController@editBlog');
        Route::delete('{id}', 'AdminController@deleteBlog');
    });
    
    // Contact routes.
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', 'AdminController@showContact');
    });

    // Portfolio route.
    Route::group(['prefix' => 'portfolio'],function () {
        Route::get('{operation}', 'AdminController@showPortfolio');
        Route::post('add', 'AdminController@addPortfolio');
        Route::patch('{id}', 'AdminController@editPortfolio');
        Route::delete('{id}', 'AdminController@deletePortfolio');
    });
});