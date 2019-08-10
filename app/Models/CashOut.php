<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CashOut extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cash_out';

    public function __construct() {
        if(!Schema::hasTable('cash_out')){
            Schema::create('cash_out',function (Blueprint $table) {
                $table->increments('id');
                $table->integer('amount');
                $table->string('type');
                $table->text('description')->nullable();
                $table->string('status');
                $table->string('bank_name')->nullable();
                $table->string('bank_acc_no')->nullable();
                $table->string('bank_account_holder_name')->nullable();
                $table->string('bank_account_type')->nullable();
                $table->string('aba_routing_number')->nullable();
                $table->integer('created_by');
                $table->integer('updated_by');
                $table->timestamps();
                $table->integer('delete_status')->default(0);
            });
        }
    }

    public function user() {
        return $this->hasOne(UserDetails::class,"id",'created_by');
    }

}
