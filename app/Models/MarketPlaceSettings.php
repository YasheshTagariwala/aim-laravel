<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MarketPlaceSettings extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marketplace_settings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['storename','org_id','store_slug','description','buyer_msg','phone','email','addressline1','addressline2','country','state','city','zipcode','logopath','bannerpath','fb_link','gp_link','tw_link','linked_link','yt_link','insta_link','created_by','updated_by','created_at','updated_at','delete_status'];


    public function sociallinks(){
        return $this->hasOne(MarketPlaceSocialLinks::class, 'org_id', 'org_id' );
    }

    public function mediaFiles(){
        return $this->hasMany(MarketPlaceMedia::class, 'marketplace_id', 'org_id' );
    }

    public function getLogoUrl(){
        if($this->logopath){
            return Storage::url($this->logopath);
        }

        return url('/assets_new/images/WP-stdavatar.png');
    }
}
