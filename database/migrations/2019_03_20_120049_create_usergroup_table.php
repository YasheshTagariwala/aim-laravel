<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsergroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usergroup', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 60);
			$table->string('url', 50)->nullable();
			$table->string('reg_url', 100);
			$table->integer('view_status')->nullable()->default(0);
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
		Schema::drop('usergroup');
	}

}
