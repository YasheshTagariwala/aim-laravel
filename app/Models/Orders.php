<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model  {

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

     protected $fillable = ['id',
                            'order_no',
                            'amount',
                            'status',
                            'created_by',
                            'updated_by',
                            'created_at',
                            'updated_at',
                            'delete_status'];


     public function setOrderNoAttribute($value){
        $iLastRecord = $this->latest()->first();
        if($iLastRecord){
            $this->attributes['order_no'] = (int)$iLastRecord->order_no + 1;
        }else{
            $this->attributes['order_no'] = config('orders.starting_no');
        }
     }

     public function orderAddress(){
         return $this->hasOne(OrdersAddresses::class, 'order_id', 'id');
     }

     public function orderProducts(){
         return $this->hasMany(OrderProducts::class, 'order_id', 'id');
     }



}
