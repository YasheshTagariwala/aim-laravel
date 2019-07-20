<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductsEnquiryComment extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_enquiry_comment';

    public function product_enquiry() {
        return $this->hasOne(ProductsEnquiry::class,'id','enquiry_id');
    }

    public function user() {
        return $this->hasOne(UserDetails::class,'id','userid');
    }

}
