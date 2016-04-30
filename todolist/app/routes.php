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

/*Route::get('/', function()
{
	return View::make('hello');
});
*/

//Hello page - login page : '/'
Route::get('/', 'HomeController@showWelcome');

//Users route
Route::resource('users', 'UserController');

//Tasks route
Route::resource('tasks', 'TaskController');

//Index page - To do list - '/index' active tasks- '/inactives' inactive tasks
Route::get('index', 'IndexController@showIndex');
Route::get('inactives', 'IndexController@showInactives');


//Authentication route
Route::post('login', 'AuthController@userLogin');
Route::get('logout', 'AuthController@userLogout');


//Specific task route
Route::get('task', 'IndexController@showIndex');
Route::get('task/{id}', 'TaskController@showTask');
Route::post('task/update', 'TaskController@update');