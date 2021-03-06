<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeepEvent extends Model
{
    protected $fillable = [
        'user_id', 'event_id',
    ];

    public function event(){
        return $this->belongsTo(\App\Event::class,'event_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
    }
}
