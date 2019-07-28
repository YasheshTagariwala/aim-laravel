<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProducts extends Model  {

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_product_qty';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = [   'id',
                              'order_id',
                              'product_id',
                              'product_price',
                              'qty',
                              'created_at',
                              'updated_at' ,
                              'deleted_at'];

    public function product() {
        return $this->hasOne(Products::class,'id','product_id');
    }
}
