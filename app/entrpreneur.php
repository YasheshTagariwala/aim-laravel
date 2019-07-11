<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entrpreneur extends Model
{
    protected $table = 'entrpreneurs';
    protected $fillable = [
        'id','name', 'city','created_by','updated_by','created_at','updated_at'
    ];
    protected $hidden = [
    ];
}
