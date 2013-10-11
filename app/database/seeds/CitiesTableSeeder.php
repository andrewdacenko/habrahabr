<?php

class CitiesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('cities')->truncate();

		$cities = array(
			array(
				'name' => 'Kiev', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'Moscow', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				)
		);

		// Uncomment the below to run the seeder
		DB::table('cities')->insert($cities);
	}

}
