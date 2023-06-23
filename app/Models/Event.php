<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'event_id';

    public function attendees()
    {
        return $this->belongsToMany(Attendee::class, 'registrations', 'event_id', 'attendee_id');
    }
}
