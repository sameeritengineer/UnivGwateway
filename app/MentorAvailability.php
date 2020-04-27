<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorAvailability extends Model
{
    //
    protected $table = 'mentor_availability';
    protected $fillable = ['from_time','to_time','date','status','mentor_id'];
}
