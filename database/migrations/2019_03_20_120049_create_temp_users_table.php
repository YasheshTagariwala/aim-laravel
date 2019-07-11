<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstname', 60);
			$table->string('lastname', 60);
			$table->string('email', 100);
			$table->string('username', 100);
			$table->string('password');
			$table->string('phone', 20)->nullable();
			$table->integer('groupid');
			$table->integer('userid')->nullable();
			$table->integer('approve_status')->nullable()->default(0);
			$table->integer('approve_by')->nullable();
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
		Schema::drop('temp_users');
	}

}
