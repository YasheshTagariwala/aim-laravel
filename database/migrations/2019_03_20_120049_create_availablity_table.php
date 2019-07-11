<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvailablityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('availablity', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('fromdate')->nullable();
			$table->date('todate')->nullable();
			$table->string('fromtime', 55)->nullable();
			$table->string('totime', 55)->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->timestamps();
			$table->integer('delete_status')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('availablity');
	}

}
