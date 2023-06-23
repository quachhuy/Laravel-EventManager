<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory;
    //use SoftDeletes;
    public $timestamps = false;
    public $primaryKey = 'registration_id';
    

    public function attendee()
    {
        return $this->belongsTo(Attendee::class, 'attendee_id', 'attendee_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }
}
