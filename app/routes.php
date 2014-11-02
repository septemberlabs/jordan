<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::route('stories.index');
});

Route::resource('categories', 'CategoriesController');

/**
 * Delete Category Record
 */
Route::get('categories/{categories}/delete', [
    'as' => 'categories.delete',
    'uses' => 'CategoriesController@destroy'
]);

Route::resource('stories', 'StoriesController');

/**
 * Delete Story Record
 */
Route::get('stories/{stories}/delete', [
    'as' => 'stories.delete',
    'uses' => 'StoriesController@destroy'
]);

Route::get('env', [
    return App::environment();
]);
