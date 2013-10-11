<?php

class CompaniesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('companies')->truncate();

		$companies = array(
			array(
				'name' => 'Habrahabr', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'toster', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				)
		);

		// Uncomment the below to run the seeder
		DB::table('companies')->insert($companies);
	}

}
