<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectFundingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_funding', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('project_from');
			$table->float('amount');
			$table->string('pay_type')->nullable();
			$table->text('comments', 65535);
			$table->integer('created_by');
			$table->integer('updated_by');
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
		Schema::drop('project_funding');
	}

}
