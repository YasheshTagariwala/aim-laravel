<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userdetails', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstname', 60);
			$table->string('lastname', 60);
			$table->string('email', 100);
			$table->string('username', 100);
			$table->string('password');
			$table->string('phone', 20)->nullable();
			$table->integer('groupid');
			$table->integer('is_hide')->default(0);
			$table->integer('userid')->nullable();
			$table->string('provider', 100)->nullable();
			$table->integer('approve_status')->default(0)->comment('0.approved');
			$table->timestamps();
			$table->integer('delete_status')->default(0);
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userdetails');
	}

}
