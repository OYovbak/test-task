<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'city', 'date',
    ];

    public function participant(){
        return $this->belongsToMany(Participant::class, 'event_participant');
    }
}
