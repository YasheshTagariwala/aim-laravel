<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_address', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('firstname', 90);
			$table->string('lastname', 90);
			$table->string('companyname');
			$table->string('country', 55);
			$table->string('email');
			$table->string('phone', 55);
			$table->string('address');
			$table->string('appartmentno', 222);
			$table->string('city');
			$table->string('state', 200);
			$table->string('zipcode', 22);
			$table->text('notes', 65535);
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
		Schema::drop('order_address');
	}

}
