<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'student';
    protected $fillable = ['first_name','last_name','email','mobile','image','resume_upload','current_specialization','country_id','city'];

    public function aspiration()
    {
        return $this->hasOne('App\Aspiration','student_id');
    }

    public function studenttest()
    {
        return $this->hasOne('App\StudentTestScore','student_id');
    }
}
