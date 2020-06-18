<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model {
	
	protected $fillable = [
		'token', 'sender_id', 'receiver_id', 'open',
	];

	public function sender(){
		return $this->belongsTo('App\User', 'sender_id', 'id');
	}

	public function receiver(){
		return $this->belongsTo('App\User', 'receiver_id', 'id');
    }

}