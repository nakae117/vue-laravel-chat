<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestEchoEvent;

class TestEchoController extends Controller {
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(){
		return view('testecho');
	}

	public function sendEcho(Request $request){
		event(new TestEchoEvent($request->message));
		return response()->json(['send' => true ]);
	}

}