<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    //
    protected $table = 'student_skill';
    protected $fillable = ['student_id','skill_id'];
}
