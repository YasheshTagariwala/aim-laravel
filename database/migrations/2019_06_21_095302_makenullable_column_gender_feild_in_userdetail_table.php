<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakenullableColumnGenderFeildInUserdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userdetails', function (Blueprint $table) {
            $table->dropColumn('gender');
        });

        Schema::table('userdetails', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userdetails', function (Blueprint $table) {
            $table->dropColumn('gender');
        });

        Schema::table('userdetails', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->after('phone');
        });
    }
}
