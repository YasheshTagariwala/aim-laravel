<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Products extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'short_desc', 'description', 'categories', 'imagepath', 'product_data', 'sale_price', 'start_date', 'end_date', 'tags', 'userid', 'created_by','video_link','youtube_link'];

    public function getImagepathAttribute($value){
        if(Storage::exists($value)){
            return Storage::url($value);
        }
        return url('assets_new/images/WP-stdavatar.png');
    }

    public function getVideoLinkAttribute($value){
        if(Storage::exists($value)){
            return Storage::url($value);
        }
        return url('assets_new/images/WP-stdavatar.png');
    }

    public function ratings() {
        return $this->hasMany(ProductsRating::class,'product_id','id');
    }

}
