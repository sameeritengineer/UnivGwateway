<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Mentor;
use App\MasterDegree;
use App\StudentSkill;
use App\MentorSkill;
use App\MentorAvailability;
use App\Aspiration;
use App\MasterCountry;
use App\Session;
use DB;
use DateTime;

class StudentDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function dashboard()
    {
        $data = []; 
        $email = Auth::user()->email;
        $student = Student::select('id','first_name','last_name','email','mobile','image','planned_degree_program_id','updated_at')->where('email',$email)->first();
        if(!empty($student->planned_degree_program_id)){
           $program_id = MasterDegree::select('name')->where('id',$student->planned_degree_program_id)->first();
           $program_name =  $program_id->name; 
        }else{
           $program_name = ''; 
        }
        $data['student'] = $student;
        $data['program_name'] = $program_name;
        return view('web.student.dashboard.dashboard',$data);

    }
    public function index()
    {
        
         $student_mentor_query =  $this->student_mentor_query();
         $degree_program_id    =  $student_mentor_query['degree_program_id'];
         $student_course    =  $student_mentor_query['student_course'];
         $country_id    =  $student_mentor_query['country_id'];
         $student_skill    =  $student_mentor_query['student_skill'];
         $student_test_id    =  $student_mentor_query['student_test_id'];
         $student_test_score    =  $student_mentor_query['student_test_score'];
         $mentors = DB::table('mentors')
                    ->select('mentors.*')
                    ->leftjoin('mentor_skill', 'mentors.id', '=', 'mentor_skill.mentor_id')
                    ->leftjoin('mentor_test_score', 'mentors.id', '=', 'mentor_test_score.mentor_id')
                    ->where(function($query) use ($degree_program_id) {
                        $query->where('mentors.degree_program_id',$degree_program_id);
                    })
                    ->orWhere(function($query) use ($student_course) {
                        $query->where('mentors.major_specialization',$student_course);
                    })
                    ->orWhere(function($query) use ($country_id) {
                        $query->whereIn('mentors.country_code',$country_id);
                    })
                    ->orWhere(function($query) use ($student_skill) {
                        $query->whereIn('mentor_skill.skill_id',$student_skill);
                    })
                    ->orWhere(function($query) use ($student_test_id,$student_test_score) {
                        $query->where('mentor_test_score.test_id',$student_test_id)
                        ->Where('mentor_test_score.score', '>' , $student_test_score);
                    })
                    ->where('status',1)
                    ->distinct('mentors.id')
                    ->limit(4)
                    ->get();

           // dd($mentors);



        //dd($country_id);

        // $mentors = DB::table('mentors')
        //     ->select('mentors.*')
        //     ->when($degree_program_id, function($query) use ($degree_program_id) {
        //         $query->where('mentors.degree_program_id', $degree_program_id);
        //         return $query;
        //     })
        //     ->when($country_id, function($query) use ($country_id) {
        //         $query->where('mentors.country_code', 1);
        //         return $query;
        //     })
        //     ->distinct('mentors.id')
        //     ->get();

        // $mentors = DB::table('mentors')
        //             ->select('mentors.*')
        //             //->leftjoin('mentor_skill', 'mentors.id', '=', 'mentor_skill.mentor_id')
        //             ->where('status',1)
        //             ->WhereIn('mentors.country_code', $country_id)
        //             ->orWhere('mentors.degree_program_id', $degree_program_id)
        //             ->orWhere('mentor_skill.skill_id', $student_skill)
        //             ->get();









        /* Get Mentor According to student countries */
        //$aspiration_data = Aspiration::select('degree_id','countries')->where('student_id',$student->id)->first();

        //dd($aspiration_data->countries);
        
       // $mentors = Mentor::select('id')->where('status', 1)->whereIn('country_code',$country_id)->pluck('id')->toArray(); 
        

        //$mentors = Mentor::select('id','first_name','last_name','degree_program_id','major_specialization','job_title','detailed_bio','image')->where('status', 1)->whereIn('id', $mentor_id)->get();
        $data['mentors'] = $mentors;
        $data['student'] = $student_mentor_query['student'];
        $data['program_name'] = $student_mentor_query['program_name'];
        return view('web.student.dashboard.student.mentors',$data);

        
    }
    public function all_mentors(){
         $student_mentor_query = $this->student_mentor_query();
         $degree_program_id    =  $student_mentor_query['degree_program_id'];
         $student_course    =  $student_mentor_query['student_course'];
         $country_id    =  $student_mentor_query['country_id'];
         $student_skill    =  $student_mentor_query['student_skill'];
         $student_test_id    =  $student_mentor_query['student_test_id'];
         $student_test_score    =  $student_mentor_query['student_test_score'];
        $mentors = DB::table('mentors')
                    ->select('mentors.*')
                    ->leftjoin('mentor_skill', 'mentors.id', '=', 'mentor_skill.mentor_id')
                    ->leftjoin('mentor_test_score', 'mentors.id', '=', 'mentor_test_score.mentor_id')
                    ->where(function($query) use ($degree_program_id) {
                        $query->where('mentors.degree_program_id',$degree_program_id);
                    })
                    ->orWhere(function($query) use ($student_course) {
                        $query->where('mentors.major_specialization',$student_course);
                    })
                    ->orWhere(function($query) use ($country_id) {
                        $query->whereIn('mentors.country_code',$country_id);
                    })
                    ->orWhere(function($query) use ($student_skill) {
                        $query->whereIn('mentor_skill.skill_id',$student_skill);
                    })
                    ->orWhere(function($query) use ($student_test_id,$student_test_score) {
                        $query->where('mentor_test_score.test_id',$student_test_id)
                        ->Where('mentor_test_score.score', '>' , $student_test_score);
                    })
                    ->where('status',1)
                    ->distinct('mentors.id')
                    ->get();
            $data['mentors'] = $mentors;
            $data['student'] = $student_mentor_query['student'];
            $data['program_name'] = $student_mentor_query['program_name'];
            return view('web.student.dashboard.student.all-mentors',$data);        
    }
    public function student_mentor_query(){
        $email = Auth::user()->email;
        $student = Student::select('id','first_name','last_name','email','mobile','image','planned_degree_program_id','updated_at')->where('email',$email)->first();
        if(!empty($student->planned_degree_program_id)){
           $program_id = MasterDegree::select('name')->where('id',$student->planned_degree_program_id)->first();
           $program_name =  $program_id->name; 
        }else{
           $program_name = ''; 
        }
        /* Get Mentor According to student Skill */
        $student_skill = StudentSkill::select('skill_id')->where('student_id',$student->id)->pluck('skill_id')->toArray();

        //dd($student_skill); 
        // $mentor_skills_according_to_student_Skill = MentorSkill::select('mentor_id')->whereIn('skill_id', $student_skill)->pluck('mentor_id')->toArray();
        // $mentor_id = array_unique($mentor_skills_according_to_student_Skill);

        $student_aspiration_data = Student::find($student->id)->aspiration;
        if(!empty($student_aspiration_data)){
          $degree_program_id = $student_aspiration_data->degree_id;
          $student_countries = $student_aspiration_data->countries;
          $student_course = $student_aspiration_data->program_courses;
          $student_countries_selected = explode(',',$student_countries);
          $country_id = array();
        
            foreach($student_countries_selected as $country){
               if($country == 'US'){
                  array_push($country_id,235);
                }elseif($country == 'UK'){
                  array_push($country_id,78); 
                }elseif($country == 'Australia'){
                  array_push($country_id,13); 
                }elseif($country == 'Canada'){
                  array_push($country_id,37); 
                }elseif($country == 'Europe'){
                  $Europe_countries_code = array(1,2,3);
                  foreach($Europe_countries_code as $europe){
                    array_push($country_id,$europe); 
                  }
                }elseif($country == 'Others'){
                    $country_id = MasterCountry::select('id')->where('status',1)->pluck('id')->toArray();
                }
            } 

        }else{
          $degree_program_id = NULL;
          $student_course    = NULL;
          $country_id = array();
        }
        
        $student_testscore_data  = Student::find($student->id)->studenttest;
        if(!empty($student_testscore_data)){
            $student_test_id = $student_testscore_data->test_id;
            $student_test_score = $student_testscore_data->total_score;
            if(empty($student_test_score)){
              $student_test_score = 0;   
            }
        }else{
            $student_test_id = NULL;
            $student_test_score = 0;
        }

        $data = [];
        $data['degree_program_id']  = $degree_program_id;
        $data['student_course']     = $student_course;
        $data['country_id']         = $country_id;
        $data['student_skill']      = $student_skill;
        $data['student_test_id']    = $student_test_id;
        $data['student_test_score'] = $student_test_score;
        $data['student'] = $student;
        $data['program_name'] = $program_name;
        return $data;

    }
    public function avilable(Request $request)
    {
        //date_default_timezone_set('America/Denver');
        //return $request->all();
        $mentor_id = $request->mentor_id;
        //return $request->startTime;
        // $startTime = date("Y-m-d H:i:s",$request->startTime/1000);
        // $endtime = date("Y-m-d H:i:s",$request->endtime/1000);
$starttime = date("Y-m-d H:i:s",$request->startTime/1000);
$given1 = new DateTime($starttime);
$given1->setTimezone(new \DateTimeZone("UTC"));
$startTime = $given1->format("Y-m-d H:i:s"); // 2014-12-12 07:18:00 UTC

$endtime = date("Y-m-d H:i:s",$request->endtime/1000);
$given2 = new DateTime($endtime);
$given2->setTimezone(new \DateTimeZone("UTC"));
$endTime = $given2->format("Y-m-d H:i:s");



        $day = $request->date;
        $month = $request->month+1;
        $year = $request->year;
        $getDate=strtotime("$year-$month-$day");
        $orignal_date=date("Y-m-d",$getDate);
        $status = 1;

         MentorAvailability::create([
                    'mentor_id' => $mentor_id,
                    'from_time'=>$startTime,
                    'to_time'=>$endTime,
                    'date'=>$orignal_date,
                    'status'=>$status
                ]);

    }
    public function single_mentor($id)
    {
     $data = [];
     $email = Auth::user()->email;
     $student = Student::select('id','first_name','last_name','email','mobile','image','planned_degree_program_id','updated_at')->where('email',$email)->first();
        if(!empty($student->planned_degree_program_id)){
           $program_id = MasterDegree::select('name')->where('id',$student->planned_degree_program_id)->first();
           $program_name =  $program_id->name; 
        }else{
           $program_name = ''; 
        }
     $mentor = Mentor::select('id','first_name','last_name','email','mobile','image')->where('id',$id)->first();    
     $mentor_avlable = MentorAvailability::select('date')->where('mentor_id',$id)->where('status',1)->pluck('date')->toArray();   
    // dd($mentor_avlable);
     $dates = array();
     foreach($mentor_avlable as $value){
         $date_data =  date('d-n-Y',strtotime($value));
        array_push($dates,$date_data);
     }
    $unique_dates =  array_values(array_unique($dates));
    $data['dates'] = $unique_dates;
    $data['mentor_id'] = $id;
    $data['student'] = $student;
    $data['program_name'] = $program_name;
    $data['mentor'] = $mentor;  
     return view('web.student.dashboard.student.single-mentor',$data);
    }
     public function slots(Request $request)
    {

        //return $request->all();
         $selected_data = date('Y-m-d',strtotime($request->selected_date));
         $mentor_id     = $request->mentor_id;
         $avilables = MentorAvailability::where('mentor_id',$mentor_id)->where('date',$selected_data)->orderBy('from_time', 'asc')->get();
         $output = '';
         //$output .= '<select>';
         foreach($avilables as $value){
            //return $time = date('H:i:s', $value->from_time);
            // $timestamp = $value->from_time;
            // $datetime = explode(" ",$timestamp);
            // return $Start_time = $datetime[1];

            $startdate = new DateTime($value->from_time, new \DateTimeZone('UTC'));
            $endtdate = new DateTime($value->to_time, new \DateTimeZone('UTC'));
//echo $date->format('Y-m-d H:i:s') . "\n";
//echo "<br>";
$startdate->setTimezone(new \DateTimeZone('Asia/Kolkata'));
$endtdate->setTimezone(new \DateTimeZone('Asia/Kolkata'));
//echo $date->format('Y-m-d H:i:s') . "\n";
$Start_time = $startdate->format('g:i a');
$End_time = $endtdate->format('g:i a');

if($value->status!=0){
  //$output .= '<input type="radio" id="slot" name="slot" value="'.$value->id.'"><label for="slot">'.$Start_time.':'.$End_time.'</label><br>';  

    $output .= '<div class="input-radio-row"><input id="slot" type="radio" name="slot" value="'.$value->id.'" class="input-radio-field"><label tabindex=1 class="input-radio-btn" for="slot">'.$Start_time.'</label></div>';
}



            // $Start_time =  date("g:i a", strtotime($value->from_time));
            // $End_time   =  date("g:i a", strtotime($value->to_time));
            // $output .= '<option value="'.$value->from_time.'">'.$Start_time.':'.$End_time.'</option>';
         }
         //$output .= '</select>';
         return $output;

      } 

  public function student_mentor_session(Request $request)
    {

        //return $request->all();
        $request->validate([
            'session_date' => 'required',
            'slot' => 'required',
        ],
        [
            'session_date.required' => 'Please Select the date',
            'slot.required' => 'Please select the date first and then slot'
        ]);
        $student_id   = $request->student_id;
        $mentor_id    = $request->mentor_id;
        $session_date = date("Y-m-d", strtotime(trim($request->session_date)) );
        $slot         = $request->slot;
        $agenda       = $request->agenda;
        $status       = 1;

        $Session = Session::create([
                    'student_id' => $student_id,
                    'mentor_id'=>$mentor_id,
                    'date'=>$session_date,
                    'slot_id'=>$slot,
                    'status'=>$status,
                    'agenda'=>$agenda,
                ]);
        if($Session){
            $update_slot = MentorAvailability::where('id',$request->slot)->update(['status'=>0]);
            if($update_slot){
                return redirect()->back()->with('success','Session Request to mentor send succesfully');
            }
        }

    }

    public function schedule_session(){
        $data = [];
        $student_dashboard = $this->student_dashboard();
        $mentors = Mentor::select('id','first_name','last_name')->where('status',1)->get();
        $data['student']      = $student_dashboard['student'];
        $data['program_name'] = $student_dashboard['program_name'];
        $data['mentors'] = $mentors;
        return view('web.student.dashboard.student.schedule-session',$data);
    }
    public function session_dates(Request $request){
        $mentor_id = $request->mentor_id;
        $mentor_avlable = MentorAvailability::select('date')->where('mentor_id',$mentor_id)->where('status',1)->pluck('date')->toArray();   
         $dates = array();
         foreach($mentor_avlable as $value){
             $date_data =  date('d-n-Y',strtotime($value));
            array_push($dates,$date_data);
         }
        return $unique_dates =  array_values(array_unique($dates));
        //return  json_encode($unique_dates);
    }

    public function student_dashboard(){
        $data = [];
        $email = Auth::user()->email;
        $student = Student::select('id','first_name','last_name','email','mobile','image','planned_degree_program_id','updated_at')->where('email',$email)->first();
        if(!empty($student->planned_degree_program_id)){
           $program_id = MasterDegree::select('name')->where('id',$student->planned_degree_program_id)->first();
           $program_name =  $program_id->name; 
        }else{
           $program_name = ''; 
        }
        $data['student'] = $student;
        $data['program_name'] = $program_name;
        return $data;
    }
       

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
