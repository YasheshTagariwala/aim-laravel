<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomProductInquiries extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'custom_product_enquiries';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marketplace_id',
        'account_type',
        'account_number',
        'account_holder',
        'bank_name',
        'abn_routing_number',
        'bank_address',
        'destination_currency',
        'bank_iban',
        'created_by',
        'updated_by'];




}
