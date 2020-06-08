<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(){
		$users = User::where('id', '!=',auth()->user()->id)->paginate(20);
		return view('index', compact('users'));
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function home(){
		return view('home');
	}

	public function get_chat($user_id){
		$user = User::find($user_id);

		$chat['user'] = $user;

		return response()->json($chat);
	}
}