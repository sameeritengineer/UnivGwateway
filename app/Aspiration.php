<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    //
    protected $fillable = ['student_id','degree_id','countries','program_courses','mentors_to_help','education_plans','higher_education'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
