<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotOfferTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('offer_id')->unsigned()->index();
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offer_tag');
	}

}
