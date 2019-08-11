<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointments extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appoinments';

    public function withUser() {
        return $this->hasOne(UserDetails::class,"id",'with_user');
    }

    public function user() {
        return $this->hasOne(UserDetails::class,"id",'created_by');
    }

}
