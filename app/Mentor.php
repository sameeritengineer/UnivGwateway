<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    //
    protected $fillable = ['first_name','last_name','email','mobile','university_attended_id','year_of_graduation','degree_program_id','major_specialization','is_employed','employer_name','job_title','country_code','detailed_bio','linkedin_url','fb_url','instagram_url','image','featured','status','created_by','updated_by','city'];

    public function degree()
    {
    	return $this->belongsTo('App\MasterDegree','degree_program_id');
    }
}
