<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorTestScore extends Model
{
    //
    protected $table = 'mentor_test_score';
    protected $fillable = ['mentor_id','test_id','test_year','score','max_score'];
}
