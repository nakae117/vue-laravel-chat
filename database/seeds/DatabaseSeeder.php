<?php

use Illuminate\Database\Seeder;
include 'UsersSeeder.php';

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run(){
		$this->call(UsersSeeder::class);
	}
}