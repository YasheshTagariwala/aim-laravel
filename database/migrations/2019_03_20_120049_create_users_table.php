<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('ID', true)->unsigned();
			$table->string('user_login', 60)->default('')->index('user_login_key');
			$table->string('user_pass')->default('');
			$table->string('user_nicename', 50)->default('')->index('user_nicename');
			$table->string('user_email', 100)->default('')->index('user_email');
			$table->string('user_url', 100)->default('');
			$table->integer('user_status')->default(0);
			$table->string('display_name', 250)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
