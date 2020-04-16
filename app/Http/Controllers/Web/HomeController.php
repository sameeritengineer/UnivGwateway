<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\MasterDegree;

class HomeController extends BaseController
{
    public function index()
    {  
      $data = [];	
      $mentors = Mentor::select('id','first_name','last_name','degree_program_id','major_specialization','job_title','detailed_bio','image')->where('status', 1)->orderByRaw('featured')->limit(8)->get();
      $data['mentors'] = $mentors; 	
      return view('web.home.index',$data);
    }
}
