<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sales extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table){
			$table->increments('id');
			$table->integer('branches_id');
			$table->integer('products_id');
			$table->string('ob');
			$table->string('issued');
			$table->string('received');
			$table->string('trans');
			$table->string('return');
			$table->string('sold');
			$table->string('demand');
			$table->date('sales_date');
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
		Schema::drop('sales');
	}

}
