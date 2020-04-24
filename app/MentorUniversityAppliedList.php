<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorUniversityAppliedList extends Model
{
    //
    protected $table = 'mentor_university_applied_list';
    protected $fillable = ['mentor_id','university_id','course_id','year_applied','application_status'];
}
