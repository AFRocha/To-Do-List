<?php

class UserController extends \BaseController {

    /**
     * Display main page if user is logged in.
     * Otherwise, log in view is generated.
     *
     * @return Response
     */

    public function index()
    {
    	if (Auth::user()){
    		return Redirect::to('index');
    	} else {
    		return View::make('hello');
    	}
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */

    public function store()
    {

    	$rules = array(
    		'username'       => 'required|min:4|max:14',
    		'password'      => 'required|min:6|max:14'
    		);

    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {
    		return Redirect::to('/')
    		->withErrors($validator)
    		->withInput(Input::except('password'));
    	} else {
    		$username = Input::get('username');
    		$password = Hash::make(Input::get('password'));
    		//Check if username already exists
    		if( sizeof (User::where('username', $username)->get()) == 0){
    			$user = new User;
    			$user->username  = $username;
    			$user->password  = $password;
    			$user->save();
    			Session::flash('message', 'Successfully created user!');
    			return Redirect::to('/');
    		}else{
    			Session::flash('message', 'That username already exists!');
    			return Redirect::to('/');
    		}
    	}
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id)
    {
    	$user = User::find($id);
    	$user->delete();

    	Session::flash('message', 'User successfully deleted!');
    	return Redirect::to('/');
    }
}