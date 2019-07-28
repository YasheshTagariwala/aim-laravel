<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userdetails';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'provider', 'provider_id'
    ];

    public function ratings() {
        return $this->hasMany(SellerRating::class,'seller_id','id');
    }
}
