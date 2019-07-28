<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class SellerRating extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seller_rating';

    public function __construct() {
        if(!Schema::hasTable('seller_rating')) {
            Schema::create('seller_rating',function (Blueprint $table) {
                $table->increments('id');
                $table->integer('seller_id');
                $table->integer('rating');
                $table->text('review');
                $table->integer('userid');
                $table->timestamps();
                $table->integer('delete_status')->default(0);
            });
        }
    }

    public function seller() {
        return $this->hasOne(UserDetails::class,'id','seller_id');
    }

    public function user() {
        return $this->hasOne(UserDetails::class,'id','userid');
    }
}
