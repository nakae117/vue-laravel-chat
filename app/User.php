<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	use Notifiable;
	protected $appends = array('name', 'url_photo');

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'username', 'email', 'password', 'photo',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Retorna el nombre completo del usuario.
	 */
	public function getNameAttribute(){
		return $this->first_name.' '.$this->last_name;
	}

	/**
	 * Retorna la url del photo.
	 */
	public function getUrlPhotoAttribute(){
		if($this->photo){
			return asset($this->photo);
		} else {
			return asset('photo/default.svg');
		}
	}

	public function chats(){
		return 1;
	}
}