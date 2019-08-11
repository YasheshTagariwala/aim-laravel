<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    public function toUser() {
        return $this->hasOne(UserDetails::class,'id','msg_to');
    }

    public function fromUser() {
        return $this->hasOne(UserDetails::class,'id','created_by');
    }

}
