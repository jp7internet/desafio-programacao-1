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
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('purchaser_name');			
			$table->decimal('purchase_count');
			$table->string('item_description');
			$table->decimal('item_price');
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
		Schema::drop('purchases');
	}

}
