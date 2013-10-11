<?php

class TagsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('tags')->truncate();

		$tags = array(
			array(
				'name' => 'php', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'javascript', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'ruby', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'python', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'laravel', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'mobile development', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				),
			array(
				'name' => 'web-development', 
				'updated_at' => DB::raw('NOW()'),
				'created_at' => DB::raw('NOW()')
				)
		);

		// Uncomment the below to run the seeder
		DB::table('tags')->insert($tags);
	}

}
