<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organizations';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    //protected $fillable = [];

    public function user() {
        return $this->hasOne(UserDetails::class,'id','created_by');
    }

}
