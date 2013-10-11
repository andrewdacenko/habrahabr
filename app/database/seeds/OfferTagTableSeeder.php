<?php

class OfferTagTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('offer_tag')->truncate();

		$offers_tags = array(
			array('offer_id' => 1, 'tag_id' => 1),
			array('offer_id' => 1, 'tag_id' => 5),
			array('offer_id' => 2, 'tag_id' => 1),
			array('offer_id' => 2, 'tag_id' => 2),
			array('offer_id' => 2, 'tag_id' => 3),
			array('offer_id' => 2, 'tag_id' => 4),
			array('offer_id' => 2, 'tag_id' => 7),
			array('offer_id' => 3, 'tag_id' => 6),
			array('offer_id' => 3, 'tag_id' => 2),
			array('offer_id' => 4, 'tag_id' => 2),
			array('offer_id' => 4, 'tag_id' => 7),
			array('offer_id' => 5, 'tag_id' => 3),
			array('offer_id' => 5, 'tag_id' => 7),
			array('offer_id' => 5, 'tag_id' => 2),
			array('offer_id' => 6, 'tag_id' => 4),
			array('offer_id' => 6, 'tag_id' => 7),
		);

		// Uncomment the below to run the seeder
		DB::table('offer_tag')->insert($offers_tags);
	}
	
}