<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Projects extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    public function user() {
        return $this->hasOne(UserDetails::class,"id",'created_by');
    }
}
