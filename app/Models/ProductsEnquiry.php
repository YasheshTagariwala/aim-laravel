<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductsEnquiry extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_enquiry';

    public function product() {
        return $this->hasOne(Products::class,'id','product_id');
    }

    public function user() {
        return $this->hasOne(UserDetails::class,'id','userid');
    }

    public function comments() {
        return $this->hasMany(ProductsEnquiryComment::class,'enquiry_id','id');
    }
}
