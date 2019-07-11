<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvestorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('investors', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('expertise', 65535);
			$table->string('capital_invesment');
			$table->string('category', 100);
			$table->string('country_interest', 55);
			$table->string('roi', 90);
			$table->string('women_stage', 90);
			$table->text('expectation', 65535);
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
		Schema::drop('investors');
	}

}
