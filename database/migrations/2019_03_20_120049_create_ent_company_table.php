<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ent_company', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('overview');
			$table->string('category', 90);
			$table->string('p_yr_revenue', 55);
			$table->string('c_yr_revenue', 55);
			$table->string('n_yr_revenue', 55);
			$table->date('founded_date')->nullable();
			$table->integer('no_employees');
			$table->string('filepath', 200)->nullable();
			$table->string('filetitle')->nullable();
			$table->string('fileurl', 200)->nullable();
			$table->string('project_img', 155);
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
		Schema::drop('ent_company');
	}

}
