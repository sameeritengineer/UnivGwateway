<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\User;
use App\Mentor;
use App\MasterService;
use App\MasterUniversity;
use App\Master_category;
use App\MasterDegree;
use App\MasterCountry;
use App\MasterSkill;
use App\MentorSkill;
use App\MasterTest;
use App\MentorTestScore;
use App\MentorUniversityAppliedList;
use Carbon\Carbon;
use App\Master_service_price;


class ServicesController extends Controller
{
    public function showallservices($slug = null)
    {
        $data = [];
        if(empty($slug))
            $services = MasterService::select('id','service_name','image','description')->where('parent_id', 0)->orderByRaw('sort')->get();
        else
           $services = MasterService::select('id','service_name','image','description')->where('parent_id', 0)->where('category_id', $slug)->orderByRaw('sort')->get(); 
        $data['services'] = $services;
        $data['slug'] = $slug;
        if(count($services)>0)
           return view('web.services.index',$data);
        else 
           return view('web.services.coming',$data);
    }

}
