<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntrepreneursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entrepreneurs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('city', 90);
			$table->string('state', 100);
			$table->string('country', 55);
			$table->string('zipcode', 90);
			$table->string('sdg', 200)->nullable();
			$table->string('gender', 10);
			$table->string('women_stage', 55);
			$table->string('logo')->nullable();
			$table->string('website', 200);
			$table->string('fb_url');
			$table->string('tw_url', 200);
			$table->string('linked_url', 155);
			$table->text('blog_url', 65535);
			$table->string('gp_url', 111);
			$table->integer('is_featured')->default(0);
			$table->integer('is_top')->default(0);
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
		Schema::drop('entrepreneurs');
	}

}
