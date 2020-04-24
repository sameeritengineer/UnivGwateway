<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\User;
use App\Mentor;
use App\MasterUniversity;
use App\MasterDegree;
use App\MasterCountry;
use App\MasterSkill;
use App\MentorSkill;
use App\MasterTest;
use App\MentorTestScore;
use App\MentorUniversityAppliedList;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

 
class RegistrationController extends Controller
{
    public function create()
    {	
    	$data = [];
    	$master_universities = MasterUniversity::select('id','name')->where('status',1)->get();
    	$master_degree = MasterDegree::select('id','name')->where('status',1)->get();
    	$master_country = MasterCountry::select('id','name')->where('status',1)->get();
      $master_skills = MasterSkill::select('id','name')->where('status',1)->get();
      $master_test = MasterTest::select('id','name','max_score')->get();
    	$data['master_universities'] = $master_universities;
    	$data['master_degree'] = $master_degree;
    	$data['master_country'] = $master_country;
      $data['master_skills'] = $master_skills;
      $data['master_test'] = $master_test;
        return view('admin.auth.register',$data);
    }
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'name' => 'required',
        //      'email' => 'required|email|unique:users|max:255',
        //      'password' => 'required|string|min:8|confirmed'
        // ]);
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
        ]);
         $request->password = 'mentor@password'; //default password for mentor
         $hash_password =  Hash::make($request->password);
         $getTheLastLoginIp = $this->getTheLastLoginIp(); // get last login ip
         $role_id = 2; // role id for mentor
         $login_date = Carbon::now()->format('d-m-Y'); //last login date


         /* create the mentor profile */
         $success = true;
         $dbError = [];
         try {

           $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $hash_password,
                'role_id' => $role_id,
                'last_login_ip' => $getTheLastLoginIp,
                'last_login_date' => date("Y-m-d", strtotime(trim($login_date))),
            ]);	
           if($user){
           	if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('uploads/mentor'), $picture);
              }else{
                   $picture = '';
              }
            $mentor = Mentor::create([
                'first_name' => $request->name,
                'last_name' => $request->lname,
                'email' => $request->email,
                'university_attended_id' =>  $request->university_id,
                'mobile'=> $request->mobile,
                'year_of_graduation' => date("Y-m-d", strtotime(trim($request->yog))),
                'degree_program_id' =>  $request->degree_id,
                'major_specialization' =>  $request->major_spl,
                'is_employed'=>  $request->is_employed,
                'employer_name'=>  $request->emp_name,
                'job_title'=>  $request->job_title,
                'country_code'=>  $request->country_code,
                'detailed_bio'=>  $request->detailed_bio,
                'linkedin_url'=>  $request->linkedin_url,
                'picture_url'=>  $request->picture_url,
                'image'=>  $picture,
                'featured'=>  $request->feature,
                'status' =>  $request->status,
            ]);
            if($mentor){
              /* insert values for mentor  skills */
              $skills = $request->mentor_skills;
              if(!empty($skills)){
                foreach($skills as $skill){
                 $create_mentor_skills = MentorSkill::create([
                    'mentor_id' => $mentor->id,
                    'skill_id' => $skill,
                 ]);
                }
              }
              /* insert values for test score for mentor */
              $test_score_list = $request->test_score_list;
              foreach($test_score_list as $list){
                $create_mentor_testscore = MentorTestScore::create([
                    'mentor_id' => $mentor->id,
                    'test_id' => $list['test_name'],
                    'test_year' =>date("Y-m-d", strtotime(trim($list['test_year'])) ),
                    'score' => $list['test_score'],
                    'max_score' => $list['test_max_score'],
                 ]);
              }
              /* insert values for Apllied Universities for mentor */
              $applied_universities = $request->applied_university_list;
              foreach($applied_universities as $list){
                $create_mentor_appliedlist = MentorUniversityAppliedList::create([
                    'mentor_id' => $mentor->id,
                    'university_id' => $list['applied_university_id'],
                    'year_applied' =>date("Y-m-d", strtotime(trim($list['applied_university_year'])) ),
                    'application_status' => $list['applied_status'],
                 ]);
              }
              
            }
            }

         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                ];
            }
        
        if($success == true){
          return redirect()->back()->with('success','Mentor Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }
    }
    public function getTheLastLoginIp()
    {

    	//whether ip is from share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   
		  {
		    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
		  }
		//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
		  {
		    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		  }
		//whether ip is from remote address
		else
		  {
		    $ip_address = $_SERVER['REMOTE_ADDR'];
		  }
		return  $ip_address;

    }


    
}