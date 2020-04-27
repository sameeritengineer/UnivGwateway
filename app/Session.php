<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $table = 'session';
    protected $fillable = ['student_id','mentor_id','slot_id','status','agenda'];
}
