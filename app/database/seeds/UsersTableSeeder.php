<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$users = array(
			array(
				'username' => 'habrahabr',
				'email'	=> 'habrahabr@habr.com',
				'password' => Hash::make('habr'),
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()'),
				)
		);

		DB::table('users')->insert($users);
	}

}
