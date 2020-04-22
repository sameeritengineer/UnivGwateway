<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileTestScore extends Model
{
    //
    protected $table = 'profile_test_score';
    protected $fillable = ['student_id','test_id','attend_year','score'];
}
