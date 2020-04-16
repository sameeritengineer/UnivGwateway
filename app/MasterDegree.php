<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterDegree extends Model
{
    //
    protected $table = 'master_degree';

    public function mentors()
    {
    	return $this->hasMany('App\Mentor','degree_program_id');
    }
}
