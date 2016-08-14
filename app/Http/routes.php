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
$allowedCategories = [
    'Arts', 'Business', 'Computers', 'Education_Blogs', 'Entertainment_Blogs', 'fashion',
    'Finance', 'Foreign_Languages', 'Games', 'Health_and_fitness', 'Crafts_hobby', 'Home_and_Garden',
    'Humor_blogs', 'Internet', 'literary_blogs', 'News__Media', 'Miscellaneous', 'Personal_Blogs',
    'Pets', 'podcasting_directory', 'Political_Blogs', 'Recreation', 'Regional', 'Religion',
    'Blog_related_resources', 'RSS_XML_Feeds', 'Science', 'shopping', 'Society', 'Sports',
    'Technology', 'Travel', 'video-blogs-vlogs', 'Writing_Publishing'
];

Route::get('/{categoryUrl}/{subcategoryUrl?}', 'CategoryController@show')
    ->where('categoryUrl', implode('|', array_map('preg_quote', $allowedCategories)));

//Route::get('/', function () {
//    return view('welcome');
//});
