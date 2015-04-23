<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurcharseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purcharses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('purchaser_name');			
			$table->string('purchase_count');
			$table->string('item_description');
			$table->string('item_price');
			$table->string('merchant_name');
			$table->string('merchant_address');			
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
		Schema::drop('purcharses');
	}

}
