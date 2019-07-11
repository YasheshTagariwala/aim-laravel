<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userlogs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('userid');
			$table->string('status', 55)->nullable();
			$table->timestamp('datetime')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('login_status')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userlogs');
	}

}
