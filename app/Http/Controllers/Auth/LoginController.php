<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(){
		$this->middleware('guest')->except('logout');
	}

	/**
	 * Modificación para el uso de usuarios y/o correos para el login.
	 * 
	 * @return array
	 */
	protected function credentials(Request $request){
		$usernameOrEmail = $request->input($this->username());

		$field = filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		return [
			$field => $usernameOrEmail,
			'password' => $request->input('password')
		];
	}

	/**
	 * Modifica el campo para poder iniciar sesión con usuario y/o correo.
	 * 
	 * @return string
	 */
	public function username(){
		return 'username_or_email';
	}
	
}