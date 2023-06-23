<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Attendee extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'attendee_id';
    


   public function events()
    {
        return $this->belongsToMany(Event::class, 'registrations', 'attendee_id', 'event_id');
    }
}
