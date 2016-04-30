<?php


class AuthController extends \BaseController
{

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */

    public function userLogin()
    {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
            );
        
        if (Auth::attempt($user)) {
            //Session::flash('message', 'Successfully logged in!');
            return Redirect::to('index');
        }
        
        Session::flash('message', 'User not found!');
        return Redirect::to('/');
    }

    /**
     * Logout user attempt.
     *
     * @return Response
     */

    public function userLogout()
    {
     Auth::logout();
     Session::flash('message', 'Sucessfully logged out!');
     return Redirect::to('/');
 }

}