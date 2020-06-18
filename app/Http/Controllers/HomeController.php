<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Chat;

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
		$users = User::where('id', '!=',auth()->user()->id)->get();

		$chats = Chat::where('sender_id', auth()->user()->id)
					->with('receiver:users.id,users.first_name,users.last_name,users.photo,users.username')
					->get();

		// dd($chats[0]->receiver);
		return view('index', compact('users', 'chats'));
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