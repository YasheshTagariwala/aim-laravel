<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersAddresses extends Model  {

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_address';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

     protected $fillable = ['id',
                            'order_id',
                            'firstname',
                            'lastname',
                            'companyname',
                            'country',
                            'email',
                            'phone' ,
                            'address' ,
                            'appartmentno',
                            'city' ,
                            'state',
                            'zipcode',
                            'notes',
                            'created_by',
                            'updated_by',
                            'created_at',
                            'updated_at',
                            'delete_status',
                            'deleted_at'];

}
