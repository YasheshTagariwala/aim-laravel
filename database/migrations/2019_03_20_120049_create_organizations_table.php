<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organizations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 90);
			$table->string('description');
			$table->string('country', 100);
			$table->text('org_logo', 65535);
			$table->date('founded_date')->nullable();
			$table->string('org_file', 100);
			$table->string('file_title', 60);
			$table->string('mission');
			$table->string('categories', 90);
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
		Schema::drop('organizations');
	}

}
