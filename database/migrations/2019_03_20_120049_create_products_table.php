<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 90);
			$table->text('short_desc', 65535);
			$table->text('description', 65535);
			$table->float('product_data');
			$table->float('sale_price');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->string('categories', 90);
			$table->string('tags', 90);
			$table->string('imagepath');
			$table->integer('userid');
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
		Schema::drop('products');
	}

}
