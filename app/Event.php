<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'content', 'title', 'image', 'place', 'date'
    ];

    public function category(){
        return $this->belongsTo(\App\Category::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(\App\Comment::class,'event_id', 'id');
    }

    public function participates(){
        return $this->hasMany(\App\ParticipateUser::class, 'event_id', 'id');
    }

    public function keeps(){
        return $this->hasMany(\App\KeepEvent::class, 'event_id', 'id');
    }
}
