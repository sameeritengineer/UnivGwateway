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
        $services = MasterService::select('id','service_name','image','description')->where('parent_id', 0)->orderByRaw('sort')->get();
        $data['services'] = $services;
        $data['slug'] = $slug;
        return view('web.services.index',$data);
    }

}
