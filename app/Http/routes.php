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

Route::resource('link', 'LinkController');
Route::resource('category', 'CategoryController');

Route::get('/', [
    'as' => 'home', 'uses' => 'HomeController@show'
]);

//Route::get('/', function () {
//    return view('welcome');
//});
