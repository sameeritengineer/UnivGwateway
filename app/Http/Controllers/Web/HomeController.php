<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\MasterDegree;
use App\MasterService;
use App\Master_category;
use App\Master_service_price;

class HomeController extends BaseController
{
    public function index()
    {  
      $data = [];	
      $mentors = Mentor::select('id','first_name','last_name','degree_program_id','major_specialization','job_title','detailed_bio','image')->where('status', 1)->orderByRaw('featured')->limit(8)->get();
      $services = MasterService::select('id','service_name','image','description')->where('parent_id', 0)->orderByRaw('sort')->limit(6)->get();
      $data['mentors'] = $mentors; 	
      $data['services'] = $services; 	
      return view('web.home.index',$data);
    }
}
