<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'name', 'surname', 'email',
    ];

    public function event(){
        return $this->belongsToMany(Event::class, 'event_participant');
    }
}
