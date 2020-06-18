<?php

namespace App\Http\Controllers;
// Models
use App\Models\Chat;

use Illuminate\Http\Request;

class ChatController extends Controller {
	
	public function create($user){
		$chat = Chat::where('sender_id', auth()->user()->id)->where('receiver_id', $user)->first();

		if($chat){
			$response[0]['receiver']['photo'] = $chat->receiver->photo;
			$response[0]['receiver']['name'] = $chat->receiver->name;
			$response[0]['receiver']['username'] = $chat->receiver->username;
			$response[0]['token'] = $chat->token;

			$chat->update([
				'open' => true
			]);

			return response()->json($response);
		} else {
			$token = str_random(16).auth()->user()->id.str_random(16).$user.str_random(16);

			$chat = Chat::create([
				'token'       => $token,
				'sender_id'   => auth()->user()->id,
				'receiver_id' => $user,
				'open'        => true
			]);

			Chat::create([
				'token'       => $token,
				'sender_id'   => $user,
				'receiver_id' => auth()->user()->id,
				'open'        => false
			]);
			
			$response[0]['receiver']['photo'] = $chat->receiver->photo;
			$response[0]['receiver']['name'] = $chat->receiver->name;
			$response[0]['receiver']['username'] = $chat->receiver->username;
			$response[0]['token'] = $chat->token;

			return response()->json($response);
		}
	}
}