<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentWorkExperience extends Model
{
    //
    protected $table = 'student_work_experience';
    protected $fillable = ['student_id','company_name','job_title','city','region_id','country_id','job_start_date','job_end_date','outcome_description','created_by','updated_by'];
}
