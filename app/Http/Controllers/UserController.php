<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Requests
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;
// Models
use App\User;
use Hash;
use Storage;

class UserController extends Controller {
	
	public function update(UserUpdateRequest $request){
		$user = auth()->user();
		$user->update($request->all());
		
		return response()->json($user);
	}

	public function updatePassword(PasswordUpdateRequest $request){
		$user = User::find(\Auth::user()->id);

		if(Hash::check($request->current_password, $user->password)){
			$user->update([
				'password' => bcrypt($request->password)
			]);

			$msj['message'] = 'Contraseña actualizada';

			return response()->json($msj);
		} else {
			$error['errors']['current_password'] = 'Contraseña incorrecta';
			return response()->json($error, 422);
		}
	}

	public function profilePicture(Request $request){
		$file = $request->file('file');

		$pathRoute = 'photo/profile';
		
		if($file != NULL){
			if(auth()->user()->photo){
				Storage::disk('public_html')->delete(auth()->user()->photo);
			}
			
			$name = str_random(8).auth()->user()->id.str_random(8).'.'.$file->getClientOriginalExtension();
			$storeRecurso = Storage::disk('public_html')->putFileAs($pathRoute, $file, $name);
			$profilePicture = $pathRoute.'/'.$name;
		}

		auth()->user()->update([
			'photo' => $profilePicture
		]);

		$photo['url'] = auth()->user()->url_photo;
		return response()->json($photo);
	}

}