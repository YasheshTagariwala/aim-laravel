<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrepreneurFundingsInformation extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ent_funding';

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
