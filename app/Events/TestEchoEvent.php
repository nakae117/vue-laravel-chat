<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEchoEvent implements ShouldBroadcast {
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public $message;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($message){
		$this->message = $message;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn(){
		// return new PrivateChannel('testecho');
		return new Channel('testecho');
	}

	public function broadcastWith(){
		return [
			'message' => $this->message,
		];
	}

	/**
	 * The event's broadcast name.
	 *
	 * @return string
	 */
	public function broadcastAs(){
		return 'message';
	}
}