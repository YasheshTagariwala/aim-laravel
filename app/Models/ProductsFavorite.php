<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProductsFavorite extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_favorite';

    public function __construct() {
        if(!Schema::hasTable('product_favorite')) {
            Schema::create('product_favorite',function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id');
                $table->integer('userid');
                $table->timestamps();
                $table->integer('delete_status')->default(0);
            });
        }
    }

    public function product() {
        return $this->hasOne(Products::class,'id','product_id');
    }

    public function user() {
        return $this->hasOne(UserDetails::class,'id','userid');
    }
}
