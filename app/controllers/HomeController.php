<?php

class HomeController extends BaseController {

	public function index() {
		return View::make('index');
	}
	
	public function login() {
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
			$user = Auth::user();
			$user->last = date('Y-m-d H:i:s');
			$user->save();
			return Redirect::intended('/');
		}
		
		return View::make('admin.login');
	}
	
	public function logout() {
		Auth::logout();
		return Redirect::intended('/');
	}

}