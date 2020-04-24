<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorSkill extends Model
{
    //
    protected $table = 'mentor_skill';
    protected $fillable = ['mentor_id','skill_id'];
}
