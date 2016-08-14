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

//Route::resource('link', 'LinkController');
//Route::resource('category', 'CategoryController');

// Home
Route::get('/', [
    'as' => 'home', 'uses' => 'HomeController@show'
]);

// Admin (temp; unauthenticated)
Route::get('/staff/category/list/{parentId?}', 'CategoryController@staffList');
Route::get('/staff/link/list/{categoryId}', 'LinkController@staffList');
Route::get('/staff/link/details/{linkId}', 'LinkController@staffDetails');

// Links
Route::get('/{linkTitle}-link-{linkId}.html', 'LinkController@show')
    ->where(['linkTitle' => '[a-zA-Z0-9\&\-]+', 'linkId' => '[0-9]+']);

// Categories
Route::get('/{categorySlug1}/{categorySlug2?}/{categorySlug3?}', 'CategoryController@show');
