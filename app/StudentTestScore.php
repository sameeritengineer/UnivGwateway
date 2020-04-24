<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTestScore extends Model
{
    //
    protected $table = 'student_test_score';
    protected $fillable = ['student_id','test_id','attend_year','total_score'];
    
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}



