<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketPlaceSocialLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_sociallinks', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->integer('org_id')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('linked_link')->nullable();
            $table->string('gp_link')->nullable();
            $table->string('yt_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('marketplace_sociallinks');
    }
}
