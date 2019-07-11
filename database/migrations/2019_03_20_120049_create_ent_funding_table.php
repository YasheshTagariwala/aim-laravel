<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntFundingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ent_funding', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('goal');
			$table->string('fund_for');
			$table->string('fund_type', 100);
			$table->string('fund_pvt', 100);
			$table->string('pre_money', 90);
			$table->string('interest', 90);
			$table->string('prev_fund');
			$table->string('fund_commitment', 200);
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
		Schema::drop('ent_funding');
	}

}
