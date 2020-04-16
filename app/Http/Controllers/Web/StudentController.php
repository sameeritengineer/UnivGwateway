<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\MasterDegree;
use App\MasterInstitute;
use App\MasterCountry;
use App\StudentWorkExperience;
use App\MasterSkill;
use App\StudentSkill;
use App\Aspiration;
use Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $email = Auth::user()->email;
        $data = []; 
        $student = Student::select('id','first_name','last_name','email','mobile','resume_headline','profile_summary')->first();
        $master_degree = MasterDegree::select('id','name')->where('status',1)->get();
        $master_institute = MasterInstitute::select('id','name')->where('status',1)->get();
        $master_country = MasterCountry::select('id','name')->where('status',1)->get();
        $master_skills = MasterSkill::select('id','name')->where('status',1)->get();
        $student_skill = StudentSkill::select('skill_id')->where('student_id',$student->id)->pluck('skill_id')->toArray();
        $skills = StudentSkill::where('student_id',$student->id)->get();
        foreach($skills as $skill){
         $get_skill_name = MasterSkill::where('id',$skill->skill_id)->first();
         $skill->name = $get_skill_name->name;
        }
        $aspiration = Aspiration::where('student_id',$student->id)->first();
        $data['student'] = $student;
        $data['master_degree'] = $master_degree;
        $data['master_institute'] = $master_institute;
        $data['master_country'] = $master_country;
        $data['master_skills'] = $master_skills;
        $data['student_skill'] = $student_skill;
        $data['skills'] = $skills;
        $data['aspiration'] = $aspiration;
        return view('web.student.profile',$data);
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

    public function resume_headline(Request $request){
        $email           = $request->email;
        $resume_headline = $request->resume_headline;
        $value = Student::where('email',$email)->update(['resume_headline'=>$resume_headline]);
        if($value){
        return Response::json(['resume_headline' => $resume_headline]);
        } 
    }
    public function profile_summary(Request $request){
        $email           = $request->email;
        $profile_summary = $request->profile_summary;
        $value = Student::where('email',$email)->update(['profile_summary'=>$profile_summary]);
        $firstdesc=substr($profile_summary, 0, 100);
        $totaldesc=substr($profile_summary, 160);


        $output = '<p>'.$firstdesc.'<span id="dots">...</span><span id="more">'.$totaldesc.'</span></p>';



        if($value){
        return Response::json(['profile_summary' => $output]);
        } 
    }
    public function skills(Request $request){
       $student_id = $request->student_id;
       $skill_ids  = $request->selectedValues;
       foreach($skill_ids as $id){
        $student_skill = StudentSkill::firstOrNew(array('student_id' => $student_id,'skill_id' => $id));
        $student_skill ->save();
       }
       $output = '';
       $student_skills = StudentSkill::where('student_id',$student_id)->get();
       foreach($student_skills as $skill){
         $get_skill_name = MasterSkill::where('id',$skill->skill_id)->first();
         $skill->name = $get_skill_name->name;
         $output .='<li>'.$skill->name.'</li>';
       }
       return Response::json(['skills' => $output]);
       
       //$shopOwner = StudentSkill::firstOrNew(array('shopId' => $theID,'metadataKey' => 2001));
    } 
    public function aspiration(Request $request){   

       $student_id = $request->student_id;
       $degree_id  = $request->degree_id;
       $countries  = implode(",",$request->countries);
       $program_course  = $request->program_course;
       $mentor_help  = implode(",",$request->mentor_help);
       $education_plans  = $request->education_plans;
       $higher_education = $request->higher_education;
       if(Aspiration::where('student_id', $student_id)->first()){
          Aspiration::where('student_id',$student_id)->update(['degree_id'=>$degree_id,'countries'=>$countries,'program_courses'=>$program_course,'mentors_to_help'=>$mentor_help,'education_plans'=>$education_plans,'higher_education'=>$higher_education]);
       }else{
          $user = Aspiration::create([
                    'student_id' => $student_id,
                    'degree_id'=>$degree_id,
                    'countries'=>$countries,
                    'program_courses'=>$program_course,
                    'mentors_to_help'=>$mentor_help,
                    'education_plans'=>$education_plans,
                    'higher_education'=>$higher_education
                ]);
       }
      // $aspiration = Aspiration::updateOrCreate(['student_id' => $student_id,'countries' => $countries]);

    }

    
    // public function student_employment(Request $request){
    //     /* save data for student employemnet in student_work_experience table */
    //     $student_work_experience = StudentWorkExperience::create([
    //                 'student_id' => $request->student_id,
    //                 'company_name' => $request->company_name,
    //                 'job_title' => $request->job_title,
    //                 'city' => $request->city,
    //                 'country_id' => $request->country_id,
    //                 'job_start_date' =>date("Y-m-d", strtotime(trim($request->job_start_date))),
    //                 'job_end_date' => date("Y-m-d", strtotime(trim($request->job_end_date))),
    //                 'outcome_description' => $request->outcome_description
    //             ]);
    // }

    
}
