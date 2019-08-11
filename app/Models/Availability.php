<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'availablity';

    public function user() {
        return $this->hasOne(UserDetails::class,"id",'created_by');
    }

}
