<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_account_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marketplace_id');
            $table->enum('account_type', ['current', 'savings']);
            $table->string('account_number');
            $table->string('account_holder');
            $table->string('bank_name');
            $table->string('abn_routing_number');
            $table->string('bank_address');
            $table->string('destination_currency');
            $table->string('bank_iban');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('bank_account_details');
    }
}
