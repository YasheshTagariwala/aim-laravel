<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPayments extends Model  {

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_payments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = [   'id' ,
                              'provider',
                              'order_id',
                              'transaction_id',
                              'order_total',
                              'provider_fee',
                              'amount',
                              'status',
                              'failed_reason',
                              'created_at',
                              'updated_at' ,
                              'deleted_at'];

    public function setProviderFeeAttribute($value){
        $this->attributes['provider_fee'] = $value / 100;
    }

    public function setAmountAttribute($value){
        $this->attributes['amount'] = $value / 100;
    }

}
