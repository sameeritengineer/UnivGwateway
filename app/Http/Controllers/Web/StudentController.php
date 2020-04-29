<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\MasterDegree;
use App\MasterUniversity;
use App\MasterInstitute;
use App\MasterCountry;
use App\StudentWorkExperience;
use App\MasterSkill;
use App\StudentSkill;
use App\Aspiration;
use App\MasterCourse;
use App\StudentEducationDetail;
use App\MasterTest;
use App\StudentTestScore;
use App\DataHigherEducation;
use App\DataEducationPlan;
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
        $student = Student::select('id','first_name','last_name','email','mobile','image','resume_headline','profile_summary','resume_upload','current_specialization','country_id','city','updated_at')->where('email',$email)->first();
        $master_degree = MasterDegree::select('id','name')->where('status',1)->get();
        $master_institute = MasterInstitute::select('id','name')->where('status',1)->get();
        $master_university = MasterUniversity::select('id','name')->where('status',1)->get();
        $master_country = MasterCountry::select('id','name')->where('status',1)->get();
        $master_skills = MasterSkill::select('id','name')->where('status',1)->get();
        $student_skill = StudentSkill::select('skill_id')->where('student_id',$student->id)->pluck('skill_id')->toArray();
        $skills = StudentSkill::where('student_id',$student->id)->get();
        foreach($skills as $skill){
         $get_skill_name = MasterSkill::where('id',$skill->skill_id)->first();
         $skill->name = $get_skill_name->name;
        }
        $aspiration = Aspiration::where('student_id',$student->id)->first();
        if(!empty($aspiration->degree_id)){
          $aspiration_degree = MasterDegree::where('id',$aspiration->degree_id)->first();
          $aspiration_degree_name = $aspiration_degree->name.' '.'Aspirant';
        }else{
          $aspiration_degree_name = '';
        }
        $studentEducationDetail = StudentEducationDetail::where('student_id',$student->id)->get();
        $country_Get =MasterCountry::where('id',$student->country_id)->first();
        if(!empty($country_Get)){
            $country_Name = $country_Get->name;
        }else{
            $country_Name = '';
        }
/* find student Profile Strenth */
$totalStrenth = $this->profileStrenth($student->id);

$master_test = MasterTest::select('id','name')->get();
$ProfileTestScore = StudentTestScore::where('student_id',$student->id)->get();

$data_higher_education = DataHigherEducation::select('id','name')->get();
$data_education_plan = DataEducationPlan::select('id','name')->get();
$StudentWorkExperience = StudentWorkExperience::where('student_id',$student->id)->get();


        $data['student'] = $student;
        $data['master_degree'] = $master_degree;
        $data['master_institute'] = $master_institute;
        $data['master_university'] = $master_university;
        $data['master_country'] = $master_country;
        $data['master_skills'] = $master_skills;
        $data['student_skill'] = $student_skill;
        $data['skills'] = $skills;
        $data['aspiration'] = $aspiration;
        $data['aspiration_degree_name'] = $aspiration_degree_name;
        $data['studentEducationDetail'] = $studentEducationDetail;
        $data['totalStrenth'] = $totalStrenth;
        $data['country_Name'] = $country_Name;
        $data['master_test'] = $master_test;
        $data['ProfileTestScore'] = $ProfileTestScore;
        $data['data_higher_education'] = $data_higher_education;
        $data['data_education_plan'] = $data_education_plan;
        $data['StudentWorkExperience'] = $StudentWorkExperience;
        return view('web.student.profile',$data);
    }
public function profileStrenth($student_id){
$count_student_summary = Student::where('id', $student_id)->where('profile_summary','<>',NULL)->count();
$count_student_resume = Student::where('id', $student_id)->where('resume_upload','<>',NULL)->count();
$count_student_skill = StudentSkill::where('student_id', $student_id)->count();
$count_student_edu   = StudentEducationDetail::where('student_id', $student_id)->count();
$count_student_aspiration   = Aspiration::where('student_id', $student_id)->count();
$strenth_1 = 0;
$strenth_2 = 0;
$strenth_3 = 0;
$strenth_4 = 0;
$strenth_5 = 0;
if($count_student_summary >0 ){
    $strenth_1 = 20;
}
if($count_student_skill >0 ){
    $strenth_2 = 20;
}
if($count_student_edu >0 ){
    $strenth_3 = 20;
}
if($count_student_aspiration >0 ){
    $strenth_4 = 20;
}
if($count_student_resume >0 ){
    $strenth_5 = 20;
}
  return $totalStrenth = $strenth_1+$strenth_2+$strenth_3+$strenth_4+$strenth_5;
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
        $student_id      = $request->student_id;
        $profile_summary = $request->profile_summary;
        $value = Student::where('email',$email)->update(['profile_summary'=>$profile_summary]);
        $firstdesc=substr($profile_summary, 0, 100);
        $totaldesc=substr($profile_summary, 160);


        $output = '<p>'.$firstdesc.'<span id="dots">...</span><span id="more">'.$totaldesc.'</span></p>';

        if($value){
        $total_strenth =  $this->profileStrenth($student_id);  
        return Response::json(['profile_summary' => $output,'total_strenth' => $total_strenth]);
        } 
    }
    public function test_score(Request $request){
        //return $request->all();
          $student_id = $request->student_id;
          $test_id    = $request->test_name;
          $attend_year = $request->attend_year;
          $score = $request->score;
          $ProfileTestScore = StudentTestScore::create([
                    'student_id' => $student_id,
                    'test_id'=>$test_id,
                    'attend_year'=>$attend_year,
                    'total_score'=>$score,
                ]);
       $ProfileTestScore = StudentTestScore::where('student_id',$student_id)->first();
       if(!empty($ProfileTestScore)){
        $testName = MasterTest::where('id',$ProfileTestScore->test_id)->first();
        $output = '<h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">TestName:</h3><p>'.$testName->name.'</p>
                         <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Test Ateend Year:</h3><p>'.$ProfileTestScore->attend_year.'</p>
                         <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Test Score: </h3><p>'.$ProfileTestScore->total_score.'</p>';
       }else{
         $output = '';
       }
       return Response::json(['test_score' => $output]);
          
    }
    public function test_score_edit(Request $request){
        
        //return $request->all();
          $test_form_id = $request->test_form_id;
          $student_id = $request->student_id;
          $test_id    = $request->select_test_name;
          $attend_year = $request->attend_year;
          $score = $request->score;
          $TestScoreTobeUpdated = StudentTestScore::find($test_form_id);
              $updateFields = [
                    'student_id' => $student_id,
                    'test_id'=>$test_id,
                    'attend_year'=>$attend_year,
                    'total_score'=>$score,
                    ];
          $TestScoreTobeUpdated->update($updateFields);
          //return redirect()->back(); 
          return redirect(url()->previous() .'#Test_score_number');
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
        $total_strenth =  $this->profileStrenth($student_id);
       return Response::json(['skills' => $output, 'total_strenth' => $total_strenth]);
       
       //$shopOwner = StudentSkill::firstOrNew(array('shopId' => $theID,'metadataKey' => 2001));
    } 
    public function aspiration(Request $request){   

       $student_id = $request->student_id;
       $degree_id  = $request->degree_id;
       if(!empty($request->countries)){
         $countries  = implode(",",$request->countries);
       }else{
         $countries  = NULL;
       }
       $program_course  = $request->program_course;
       if(!empty($request->mentor_help)){
        $mentor_help  = implode(",",$request->mentor_help);
       }else{
         $mentor_help  = NULL;
       }
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
        $aspiration  = Aspiration::where('student_id',$student_id)->first();
        $degree_name = MasterDegree::where('id',$aspiration->degree_id)->first();
        if(!empty($degree_name)){
          $degree_name = $degree_name->name;
        }else{
          $degree_name = '';
        }
        $array_mentor_help = array("Determining target schools","Creating a schedule for college / MBA applications (from Test prep to Admissions)","Building your (or your child's) profile","Choosing Recommenders","Brainstorming for essays","Something else");
        if(!empty($aspiration->mentors_to_help)){
            $explode_help = explode(',',$aspiration->mentors_to_help);
            $help_output = '';
            foreach($explode_help as $help){
              $help_output .= '<p>'.$array_mentor_help[$help].'</p>';
            } 
        }else{
              $help_output  = '';
        }
        
        $education_plans = array("I want to change careers, and need help with making my application stand out.","I am confused about programs being offered by the institutes and the career choices afterwards. I need some guidance.","I have a very simple background story to tell. How should I tell it effectively? Basically, I need to make my profile & career work sound impressive.","I am running late on my application plans and need help managing the workload efficiently.","With no captivating extracurriculars, how do I stand out from the crowd?","Something else");
        $higher_education = array('Spring 2021','Fall 2021','Spring 2022','Fall 2022','2023 & later');

        if(!empty($aspiration->education_plans)){
            $education_plans_data  = DataEducationPlan::where('id',$aspiration->education_plans)->first();
            $education_plans = $education_plans_data->name;
        }else{
            $education_plans = '';
        }

        if(!empty($aspiration->higher_education)){
             $higher_education_data = DataHigherEducation::where('id',$aspiration->higher_education)->first();
             $higher_education = $higher_education_data->name;
          }else{
             $higher_education = '';
          }
                        
        $output = '';

        $output .= '<div class="user-show-data margin-bottom-15 width-47-per">
                        <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What Degree Program do you want to apply for</h3>
                        <p>'.$degree_name.'</p>
                    </div>';
        $output .= '<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
                        <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What is your preferred list of countries for study</h3>
                        <p>'.$aspiration->countries.'</p>
                    </div>';
        $output .= '<div class="user-show-data margin-bottom-15 width-47-per">
                        <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What programs are courses are you considering presently</h3>
                        <p>'.$aspiration->program_courses.'</p>
                    </div>'; 
        $output .= '<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
                        <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Where do you want UnivGateway mentors to help?</h3>
                              '.$help_output.'
                    </div>';
        $output .= '<div class="user-show-data margin-bottom-15 width-47-per">
                        <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">What are key questions/concerns/worries about your education plans</h3>
                        <p>'.$education_plans.'</p>
                    </div>';
        $output .= '<div class="user-show-data margin-bottom-15 width-47-per margin-left-5-per">
                        <h3 class="text-color-second font-size-16 font-weight-600 margin-bottom-none margin-top-none">Which semester &amp; year do you intend to go for higher education</h3>
                        <p>'.$higher_education.'</p>
                    </div>';                                                           
        $total_strenth =  $this->profileStrenth($student_id);
        $aspiration_degree_name = $degree_name.' '.'Aspirant';
        return Response::json(['aspiration' => $output, 'total_strenth' => $total_strenth,'aspiration_degree_name' => $aspiration_degree_name]);           

    }
    public function personal(Request $request){   
       //return $request->all();
       $student_id =  $request->student_id;
       $first_name = $request->first_name;
       $last_name = $request->last_name;
       $mobile = $request->mobile;
       $Pursuing_edu = $request->Pursuing_edu;
       $select_country = $request->select_country;
       $cityname = $request->cityname;

       $studentToBeUpdated = Student::find($student_id);
            if ($request->hasFile('profile_image'))
              {
                    $file      = $request->file('profile_image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('uploads/student'), $picture);
              }else{
                    $picture = $studentToBeUpdated->image;
              }
              $updateFields = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile'=> $request->mobile,
                'image'=>  $picture,
                'current_specialization'=>  $Pursuing_edu,
                'country_id'=>  $select_country,
                'city'=>  $cityname,
                    ];
             $studentToBeUpdated->update($updateFields);
             $student = Student::select('id','first_name','last_name','email','mobile','image','current_specialization','country_id','city')->where('id',$student_id)->first();
             $country_Get =MasterCountry::where('id',$student->country_id)->first();
                if(!empty($country_Get)){
                    $country_Name = $country_Get->name;
                }else{
                    $country_Name = '';
                }
             $image = asset('uploads/student/'.$student->image);
             $editIcon = asset('web/images/Editiconcommon3.png');
             $output = '';

             $output .= '<div class="col-md-12 col-sm-12 col-xs-12 user-profile-img-section text-center padding-top-50 padding-bottom-15"><div class="container"><div class="row">
                            <div class="user-profile-img center-block">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <img class="user-img" src="'.$image.'" alt="" />
                                </div>

                                <div class="user-name-row col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="text-color-theme font-size-30 font-weight-600">'.$student->first_name.' '.$student->last_name.'</h3>
                                    <img class="edit-profile-iocn" src="'.$editIcon.'" alt="" />
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="text-color-second font-weight-600 font-size-20 margin-top-none">Profile Last Updated - Today</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
             $output .= '<div class="col-md-12 col-sm-12 col-xs-12 profile-complte-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 user-profile-row">
                <div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
                    <div class="display-grid space-between">
                        <div class="right-data display-grid display-grid-center mob-margin-bottom-15">
                            <img class="margin-right-30" src="'.asset('web/images/stduentprof_expicon.png').'" alt="" />
                            <h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Pursuing '.$student->current_specialization.'</h3>
                        </div>

                        <div class="left-date display-grid display-grid-center mob-margin-bottom-15">
                            <img class="margin-right-30" src="'.asset('web/images/phoneiconcommon.png').'" alt="" />
                            <h3 class="text-white font-size-20 margin-bottom-none margin-top-none">'.$student->mobile.'</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
                    <div class="display-grid space-between">
                        <div class="right-data display-grid display-grid-center mob-margin-bottom-15">
                            <img class="margin-right-30" src="'.asset('web/images/LOcation-icon.png').'" alt="" />
                            <h3 class="text-white font-size-20 margin-top-none margin-bottom-none">'.$student->city.' '.$country_Name.'</h3>
                        </div>

                        <div class="left-date display-grid display-grid-center mob-margin-bottom-15">
                            <img class="margin-right-30" src="'.asset('web/images/MAilicon.png').'" alt="" />
                            <h3 class="text-white font-size-20 margin-bottom-none margin-top-none">'.$student->email.'</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 user-data-row">
                    <div class="display-grid space-between">
                        <div class="right-data display-grid display-grid-center">
                            <h3 class="text-white font-size-20 margin-top-none margin-bottom-none">Student Profile Strenth</h3>
                        </div>

                        <div class="right-data display-grid display-grid-center">
                            <h3 class="text-white font-size-20 margin-top-none margin-bottom-none">80%</h3>
                        </div>
                    </div>
                    <div class="strenth-container">
                        <div class="skills-strenth"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>';
                return Response::json(['personal' => $output]); 

    
       // return $image = $request->file('profile_image');
    } 
// public function institute(Request $request){
//       $uni_id = $request->uni_id;
//       $institutes = MasterInstitute::select('id','name')->where('university_id',$uni_id)->where('status',1)->get();
//       $output = '';
//       $output = '<option value="">Select Institute</option>';
//       foreach($institutes as $institute){
//        $output .='<option value="'.$institute->id.'">'.$institute->name.'</option>';
//       }
//       return Response::json(['institute' => $output]); 
//   }
// public function course(Request $request){
//       $institute_id = $request->institute_id;
//       $courses = MasterCourse::select('id','name')->where('institute_id',$institute_id)->get();
//       $output = '';
//       $output = '<option value="">Select Course</option>';
//       foreach($courses as $course){
//        $output .='<option value="'.$course->id.'">'.$course->name.'</option>';
//       }
//       return Response::json(['course' => $output]); 
// }  
public function education(Request $request){
      //return $request->all();
      $student_id = $request->student_id;
      $degree_id = $request->degree_id;
      $university_id = $request->select_university;
      $institute_id = $request->select_institute;
      $course_specialization = $request->course_specialization;
      $course_type = $request->course_type;
      $passing_out_year = $request->passing_out_year;
      $grading_system = $request->grading_system;
      $grading_value = $request->grade_value;
      $student_education = StudentEducationDetail::create([
                    'student_id' => $student_id,
                    'degree_id' => $degree_id,
                    'university_value' => $university_id,
                    'institute_value' => $institute_id,
                    'course_specialization' => $course_specialization,
                    'course_type' =>$course_type,
                    'passing_out_year' => $passing_out_year,
                    'grading_system' =>  $grading_system,
                    'grade_value' =>  $grading_value
                ]);
      $studentEducationDetail = StudentEducationDetail::where('student_id',$student_id)->get();
      //$university_name = MasterUniversity::where('id',$university_id)->first();
      $course_type_array = array('Full Time','Part Time','Correspondence/Distance learning');
      $editIcon = asset('web/images/Editiconcommon3.png');
      $output = '';
      foreach($studentEducationDetail as $details){
        $degree_value = MasterDegree::where('id',$details->degree_id)->first();
              if(!empty($degree_value->name)){
                $degree_name  = $degree_value->name;
              }else{
                $degree_name  = '';
              }
        $output .= '<div class="education_inner"><h3 class="desination margin-top-none font-size-18 text-color-gray">'.$details->course_specialization.'<span><img data-education="'.$details->id.'" class="education-edit-icon edit_education_btn" src="'.$editIcon.'" alt=""></span></h3><h3 class="company_name margin-top-none font-size-16 text-color-gray">'.$details->university_value.'</h3><h3 class="company_name margin-top-none font-size-16 text-color-gray">'.$details->institute_value.'</h3><h3 class="joining margin-top-none font-size-16 text-color-gray margin-bottom-15">'.$details->passing_out_year.' ('.$details->course_type.')</h3><h3 class="company_name margin-top-none font-size-16 text-color-gray">'.$details->grading_system.'</h3></div>';

      }
      return Response::json(['education' => 1]);


}
public function education_edit(Request $request){
    //return $request->all();
      $education_form_id = $request->education_form_id;
      $student_id = $request->student_id;
      $degree_id = $request->degree_id;
      $university_id = $request->select_university;
      $institute_id = $request->select_institute;
      $course_id = $request->select_course;
      $course_specialization = $request->course_specialization;
      $course_type = $request->course_type;
      $passing_out_year = $request->passing_out_year;
      $grading_system = $request->grading_system;
      $grading_value = $request->grade_value;
      $StudentEducationDetailToBeUpdated = StudentEducationDetail::find($education_form_id);
              $updateFields = [
                    'student_id' => $student_id,
                    'degree_id' => $degree_id,
                    'university_value' => $university_id,
                    'institute_value' => $institute_id,
                    'course_specialization' => $course_specialization,
                    'course_type' =>$course_type,
                    'passing_out_year' => $passing_out_year,
                    'grading_system' =>  $grading_system,
                    'grade_value' =>  $grading_value
                    ];
      $StudentEducationDetailToBeUpdated->update($updateFields);
      $studentEducationDetail = StudentEducationDetail::where('student_id',$student_id)->get();
      //$university_name = MasterUniversity::where('id',$university_id)->first();
      $course_type_array = array('Full Time','Part Time','Correspondence/Distance learning');
      $editIcon = asset('web/images/Editiconcommon3.png');
      $output = '';
      foreach($studentEducationDetail as $details){
        $output .= '<div class="education_inner"><h3 class="desination margin-top-none font-size-18 text-color-gray">'.$details->course_specialization.'</h3>
                        <h3 class="company_name margin-top-none font-size-16 text-color-gray">'.$details->university_value.'<span><img data-education="'.$details->id.'" class="education-edit-icon edit_education_btn" src="'.$editIcon.'" alt=""></span></h3>
                        <h3 class="joining margin-top-none font-size-16 text-color-gray margin-bottom-15">'.$details->passing_out_year.' ('.$course_type_array[$details->course_type].')</h3></div>';

      }
      return Response::json(['education' => $output]);
}
public function upload_resume(Request $request){
       $student_id = $request->student_id;
       $studentToBeUpdated = Student::find($student_id);
            if ($request->hasFile('upload_resume'))
              {
                    $file      = $request->file('upload_resume');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'+'.$filename;
                    $uploadSuccess = $file->move(public_path('uploads/student'), $picture);
              }else{
                    $picture = $studentToBeUpdated->resume_upload;
              }
              $updateFields = ['resume_upload' => $picture];
              $studentToBeUpdated->update($updateFields);
              return redirect('/student_admin');
}
     

    
    public function student_employment(Request $request){
      //return $request->all();
        /* save data for student employemnet in student_work_experience table */
        $student_work_experience = StudentWorkExperience::create([
                    'student_id' => $request->student_id,
                    'company_name' => $request->company_name,
                    'job_title' => $request->job_title,
                    'city' => $request->city,
                    'country_id' => $request->country_id,
                    'job_start_date' =>date("Y-m-d", strtotime(trim($request->job_start_date))),
                    'job_end_date' => date("Y-m-d", strtotime(trim($request->job_end_date))),
                    'outcome_description' => $request->outcome_description
                ]);

      $StudentWorkExperience = StudentWorkExperience::where('student_id',$request->student_id)->get();
       $output = '';
       foreach($StudentWorkExperience as $exp){
        $output .= '<div class="user-show-data margin-bottom-30">
            <h3 class="desination margin-top-none font-size-18 text-color-gray">'.$exp->job_title.'</h3>
            <h3 class="company_name margin-top-none font-size-16 text-color-gray">'.$exp->company_name.'</h3>
            <h3 class="joining margin-top-none font-size-16 text-color-gray margin-bottom-15  ">'.$exp->job_start_date.' to '.$exp->job_end_date.'</h3>
            <b>'.$exp->city.'</b>
            <p>'.$exp->outcome_description.'</p>
          </div>';
       }

       return Response::json(['employemnet' => $output]);
        

    }

    
}
