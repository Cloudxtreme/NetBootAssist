<?php

class LoginController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}
	
	public function doLoginForm()
	{
		return View::make('webinterface/login');
	}
	
	public function doLoginAction()
	{
		if (Auth::attempt(array('is_active' => 1, 'username'=>Input::get('username'), 'password'=>Input::get('password')))) {
			return Redirect::intended('dashboard');
		} else {
			return Redirect::to('/')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}
	
	public function doLogout()
	{
		Auth::logout();
		return Redirect::intended('/')->with('message', 'Your are now logged out!');
	}

}