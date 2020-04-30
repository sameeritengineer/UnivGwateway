<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentUniversity extends Model
{
    //
    protected $table = 'student_university';
    protected $fillable = ['student_id','university_id','course_id','date_applied','application_status','classification'];
}
