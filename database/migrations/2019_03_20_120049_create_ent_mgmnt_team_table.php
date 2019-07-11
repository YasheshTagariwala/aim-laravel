<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntMgmntTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ent_mgmnt_team', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('position');
			$table->string('email');
			$table->text('description', 65535);
			$table->string('photograph', 155);
			$table->string('linked_url')->nullable();
			$table->string('fb_url')->nullable();
			$table->string('tw_url', 200)->nullable();
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
		Schema::drop('ent_mgmnt_team');
	}

}
