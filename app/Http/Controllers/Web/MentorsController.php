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
use Illuminate\Support\Facades\Auth;
use DB;

class MentorsController extends Controller
{
    public function showallmentors(Request $request)
    {
        if (!Auth::check()){
           return redirect('student-signin');
        } 
        $pageNumber     = $request->pageNumber;
        $search     = $request->search;
        $search_text_val  = $request->search_text_val;
        $university = "";$degree ="";$masterSearch='';
        if($search == "university" && !empty($search_text_val))
         $university = 'university';
        if($search == "degree"  && !empty($search_text_val))
         $degree = 'degree';
        if($search == ""  && !empty($search_text_val))
         $masterSearch = 'masterSearch';
        $limit = 4;
        if(!empty($pageNumber))
            $limit = $pageNumber*4;
        else 
            $pageNumber=1; 
        $mentors = DB::table('mentors')
                ->select('mentors.*')
                ->leftjoin('mentor_skill', 'mentors.id', '=', 'mentor_skill.mentor_id')
                ->leftjoin('mentor_test_score', 'mentors.id', '=', 'mentor_test_score.mentor_id')
                ->leftjoin('mentor_university_applied_list', 'mentors.id', '=', 'mentor_university_applied_list.mentor_id')
                ->leftjoin('master_university', 'master_university.id', '=', 'mentor_university_applied_list.university_id')
                ->leftjoin('master_university as mu', 'mu.id', '=', 'mentors.university_attended_id')
                ->leftjoin('master_degree', 'mentors.degree_program_id', '=', 'master_degree.id')
                ->where('mentors.status',1)
                ->when($university, function($query) use ($search_text_val) {
                      $query->where('master_university.name', 'like', '%' . $search_text_val . '%')
                          ->orWhere('mu.name', 'like', '%' . $search_text_val . '%');
                      return $query;
                })
                ->when($degree, function($query) use ($search_text_val) {
                      $query->where('master_degree.name', 'like', '%' . $search_text_val . '%');
                      return $query;
                })
                ->when($masterSearch, function($query) use ($search_text_val) {
                      $query->where('mentors.detailed_bio', 'like', '%' . $search_text_val . '%');
                      return $query;
                })
                ->distinct('mentors.id')
                ->limit($limit)
                ->get();
                //->toSql();
        $data['mentors'] = $mentors;
        if($pageNumber>1){
            return view('web.mentor.index-load-more',$data);
        } else{
            return view('web.mentor.index',$data);
        }        
    }

}
