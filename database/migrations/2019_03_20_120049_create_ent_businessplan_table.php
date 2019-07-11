<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntBusinessplanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ent_businessplan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('idea', 65535);
			$table->text('women_model', 65535);
			$table->text('customer', 65535);
			$table->text('market', 65535);
			$table->text('industry', 65535);
			$table->text('product', 65535);
			$table->text('campaign', 65535);
			$table->text('budget', 65535);
			$table->text('team', 65535);
			$table->text('pitch', 65535);
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
		Schema::drop('ent_businessplan');
	}

}
