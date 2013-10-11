<?php

class RolesTableSeeder extends Seeder {

	public function run()
	{
		$roles = array(
			array(
				'role' => 'admin', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'role' => 'manager', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'role' => 'moderator', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				)

		);

		DB::table('roles')->insert($roles);
	}

}
