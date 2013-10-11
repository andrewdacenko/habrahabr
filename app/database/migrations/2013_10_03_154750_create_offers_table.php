<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('city_id')->unsigned();
			$table->integer('company_id')->unsigned();
			$table->integer('off')->unsigned();
			$table->string('image');
			$table->date('expires');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offers');
	}

}
