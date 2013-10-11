<?php

class RoleUserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('role_user')->truncate();

		$role_user = array(
			array('user_id' => 1, 'role_id' => 1)
		);

		// Uncomment the below to run the seeder
		DB::table('role_user')->insert($role_user);
	}

}
