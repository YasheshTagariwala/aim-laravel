<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketPlaceSocialLinks extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marketplace_sociallinks';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['org_id','fb_link','tw_link','linked_link','gp_link','yt_link','insta_link'];


}
