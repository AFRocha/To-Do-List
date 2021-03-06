<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

 	/**
     * Display main page if user is logged in.
     * Otherwise, log in view is generated.
     *
     * @return Response
     */

	public function showWelcome()
	{
		if (Auth::user()){
			return Redirect::to('index');
		} else {
			return View::make('hello');
		}
	}
}