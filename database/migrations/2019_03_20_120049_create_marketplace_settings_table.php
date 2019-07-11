<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarketplaceSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marketplace_settings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('storename', 60);
			$table->integer('org_id');
			$table->string('store_slug', 100)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('buyer_msg', 200)->nullable();
			$table->string('phone', 90)->nullable();
			$table->string('email')->nullable();
			$table->string('addressline1')->nullable();
			$table->string('addressline2')->nullable();
			$table->string('country', 55)->nullable();
			$table->string('state', 55)->nullable();
			$table->string('city', 55)->nullable();
			$table->integer('zipcode')->nullable();
			$table->string('logopath')->nullable();
			$table->string('bannerpath')->nullable();
			$table->string('fb_link', 90)->nullable();
			$table->string('gp_link', 90)->nullable();
			$table->string('tw_link', 90)->nullable();
			$table->string('linked_link', 90)->nullable();
			$table->string('yt_link', 90)->nullable();
			$table->string('insta_link', 90)->nullable();
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
		Schema::drop('marketplace_settings');
	}

}
