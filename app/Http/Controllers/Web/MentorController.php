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

class MentorController extends Controller
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

    public function showcalender()
    {
      $data = [];   
      $email = Auth::user()->email;
      $mentor = Mentor::select('id','first_name','last_name','email','mobile','image','updated_at')->where('email',$email)->first();
      $data['mentor'] = $mentor;  
      return view('web.mentor.test',$data);
    }

    public function profile()
    {
      $data = [];   
      $email = Auth::user()->email;
      $mentor = Mentor::select('id','first_name','last_name','email','mobile','image','country_code','detailed_bio','linkedin_url','fb_url','instagram_url','major_specialization','city','updated_at')->where('email',$email)->first();
      $master_country = MasterCountry::select('id','name')->where('status',1)->get();
      $country_Get =MasterCountry::where('id',$mentor->country_code)->first();
        if(!empty($country_Get)){
            $country_Name = $country_Get->name;
        }else{
            $country_Name = '';
        }
      $data['mentor'] = $mentor;
      $data['master_country'] = $master_country; 
      $data['country_Name'] = $country_Name;
      return view('web.mentor.profile',$data);
    }
    public function signup_profile(Request $request)
    {
      //dd($request->all());
        $mentor_id = $request->mentor_id;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $major_specialization = $request->major_specialization;
        $mobile = $request->mobile;
        $city = $request->city;
        $country_code = $request->country_code;
        $biography = $request->biography;
        $fb_url = $request->fb_url;
        $linkedin_url = $request->linkedin_url;
        $instagram_url = $request->linkedin_url;

        $value = Mentor::where('id',$mentor_id)->update(['first_name'=>$first_name,'last_name'=>$last_name,'major_specialization'=>$major_specialization,'mobile'=>$mobile,'detailed_bio'=>$biography,'fb_url'=>$fb_url,'linkedin_url'=>$linkedin_url,'instagram_url'=>$instagram_url,'city'=>$city,'country_code'=>$country_code]);
        if($value){
            return redirect('mentor_admin');
        }

    }
    public function requested_student()
    {
        $data = [];
        $email = Auth::user()->email;
        $mentor = Mentor::select('id')->where('email',$email)->first();
        //$requested_student = Session::where('mentor_id',$mentor->id)->where('status',1)->get();
 
        $session_status = 1;
        $requested_student = DB::table('student')
                    ->select('student.*','session.mentor_id','session.slot_id','session.agenda','session_status.name as session_status','mentor_availability.from_time','mentor_availability.date')
                    ->leftjoin('session', 'student.id', '=', 'session.student_id')
                    ->leftjoin('session_status', 'session.status', '=', 'session_status.id')
                    ->leftjoin('mentor_availability', 'session.slot_id', '=', 'mentor_availability.id')
                    ->where(function($query) use ($session_status) {
                        $query->where('session.status',$session_status);
                    })
                    ->get();
//dd($requested_student);
        $data['requested_student'] = $requested_student;
        return view('web.mentor.requested-mentor',$data);
        

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