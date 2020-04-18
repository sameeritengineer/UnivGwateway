<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEducationDetail extends Model
{
    //
    protected $table = 'student_education_detail';
    protected $fillable = ['student_id','institute_id','highest_grade_studied','degree_id','degree_specialization','program_start_date','program_end_date','program_score','program_max_score','program_score_format','created_by','updated_by','university_id','course_id','course_specialization','course_type','passing_out_year','grading_system'];
}
