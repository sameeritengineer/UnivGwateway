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

class MentorController extends Controller
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
        //
        $email = Auth::user()->email;
        $student = Student::select('id','first_name','last_name','email','mobile','image','planned_degree_program_id','updated_at')->where('email',$email)->first();
        if(!empty($student->planned_degree_program_id)){
           $program_id = MasterDegree::select('name')->where('id',$student->planned_degree_program_id)->first();
           $program_name =  $program_id->name; 
        }else{
           $program_name = ''; 
        }
        $student_skill = StudentSkill::select('skill_id')->where('student_id',$student->id)->pluck('skill_id')->toArray(); 
        $mentor_skills_according_to_student_Skill = MentorSkill::select('mentor_id')->whereIn('skill_id', $student_skill)->pluck('mentor_id')->toArray();
        $mentor_id = array_unique($mentor_skills_according_to_student_Skill);
        $mentors = Mentor::select('id','first_name','last_name','degree_program_id','major_specialization','job_title','detailed_bio','image')->where('status', 1)->whereIn('id', $mentor_id)->limit(4)->get();
        $data['mentors'] = $mentors;
        $data['student'] = $student;
        $data['program_name'] = $program_name;
         return view('web.student.dashboard.student.mentors',$data);

        
    }
    public function avilable(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        //return $request->all();
        $mentor_id = $request->mentor_id;
        //return $request->startTime;
        $startTime = date("Y-m-d H:i:s",$request->startTime/1000);
        $endtime = date("Y-m-d H:i:s",$request->endtime/1000);
        $day = $request->date;
        $month = $request->month+1;
        $year = $request->year;
        $getDate=strtotime("$year-$month-$day");
        $orignal_date=date("Y-m-d",$getDate);
        $status = 1;

         MentorAvailability::create([
                    'student_id' => $mentor_id,
                    'from_time'=>$startTime,
                    'to_time'=>$endtime,
                    'date'=>$orignal_date,
                    'status'=>$status
                ]);

    }
    public function single_mentor($id)
    {
     $data = []; 
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
    //dd($data);
     return view('web.student.dashboard.student.single-mentor',$data);
    }
     public function slots(Request $request)
    {

        //return $request->all();
         $selected_data = date('Y-m-d',strtotime($request->selected_date));
         $mentor_id     = $request->mentor_id;
         $avilables = MentorAvailability::where('mentor_id',$mentor_id)->where('date',$selected_data)->orderBy('from_time', 'asc')->get();
         $output = '';
         $output .= '<select>';
         foreach($avilables as $value){
            //return $time = date('H:i:s', $value->from_time);
            // $timestamp = $value->from_time;
            // $datetime = explode(" ",$timestamp);
            // return $Start_time = $datetime[1];
            $Start_time =  date("g:i a", strtotime($value->from_time));
            $End_time   =  date("g:i a", strtotime($value->to_time));
            $output .= '<option value="'.$value->from_time.'">'.$Start_time.':'.$End_time.'</option>';
         }
         $output .= '</select>';
         return $output;

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
