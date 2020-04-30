<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\MasterDegree;
use App\MasterUniversity;
use App\MasterCourse;
use App\StudentUniversity;

class StudentUniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
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
        $master_universities = MasterUniversity::select('id','name')->where('status',1)->get();
        $master_courses = MasterCourse::select('id','name')->get();
        $StudentUniversity = StudentUniversity::where('student_id',$student->id)->get();
        $data['student'] = $student;
        $data['program_name'] = $program_name;
        $data['master_universities'] = $master_universities;
        $data['master_courses'] = $master_courses;
        $data['StudentUniversity'] = $StudentUniversity;
         return view('web.student.dashboard.student.student-university',$data);
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
        //dd($request->all());
       $student_id              = $request->student_id;
       $university_id           = $request->university_id;
       $course_id               = $request->course_id;
       $applied_university_year = $request->applied_university_year;
       $applied_status          = $request->applied_status;
       $description             = $request->description;
       $student_university      = StudentUniversity::create([
                                'student_id' => $student_id,
                                'university_id' => $university_id,
                                'course_id' => $course_id,
                                'date_applied' => date("Y-m-d", strtotime(trim($applied_university_year))),
                                'application_status' => $applied_status,
                                'classification' => $description,
                                ]);
       if($student_university){
          return redirect()->back()->with('success','University Applied Succesfully');
       }else{
          return redirect()->back()->with('error', 'There is some issue');
        }
    }
    public function update_student_university(Request $request)
    {
       $student_university_id   = $request->student_university_id;  
       $student_id              = $request->student_id;
       $university_id           = $request->university_id;
       $course_id               = $request->course_id;
       $applied_university_year = $request->applied_university_year;
       $applied_status          = $request->applied_status;
       $description             = $request->description;
       $StudentUniversityToBeUpdated = StudentUniversity::find($student_university_id);
              $updateFields = [
                    'student_id' => $student_id,
                    'university_id' => $university_id,
                    'course_id' => $course_id,
                    'date_applied' => date("Y-m-d", strtotime(trim($applied_university_year))),
                    'application_status' => $applied_status,
                    'classification' => $description,
                    ];
      $StudentUniversityToBeUpdated->update($updateFields);
      if($StudentUniversityToBeUpdated){
          return redirect()->back()->with('success','University Updated Succesfully');
       }else{
          return redirect()->back()->with('error', 'There is some issue');
       }
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
