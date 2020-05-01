<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\User;
use App\Student;
use App\MasterCountry;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

class RegistrationController extends BaseController
{
	public function signup()
    {  
      $data = [];
      $master_country = MasterCountry::select('id','name','phone_code')->where('status',1)->get();
      $data['master_country'] = $master_country;
      return view('web.home.signup',$data);
    }
  public function verifyotp()
    {  
      return view('web.home.verifyotp');
    }
  public function resendotp()
    {  
      
          $apiKey = urlencode('grgpALgWAbk-MfixOlCHHxz79kKeEIkN29PcsQsY8J');
  
          // Message details
          //$numbers = array(918284904441);
          $phone = Session::get('mobile');
          $code = 91;
          $phonewithCountrycode = (int)($code . $phone);
          $numbers = array();
          array_push($numbers,$phonewithCountrycode );
          $sender = urlencode('TXTLCL');
           
          $four_digit_random_number = mt_rand(1000,9999); 
          Session::put('otp', $four_digit_random_number);
          $message = rawurlencode('This is your otp '.$four_digit_random_number);
         
          $numbers = implode(',', $numbers);
         
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
         
          // Send the POST request with cURL
          $ch = curl_init('https://api.textlocal.in/send/');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          curl_close($ch);
          return redirect('/verifyotp');
      
    }    
  public function verifyotpcheck(Request $request)
    {  
      $otp = Session::get('otp');
      
      $getopt = $request->otp;
      if($getopt == $otp){
        /* session values */
       $f_name = Session::get('firstname');
       $l_name = Session::get('lasttname');
       $mobile = Session::get('mobile');
       $password = Session::get('password');
       $hash_password =  Hash::make($password);
       $email = Session::get('email');
       $country_id = Session::get('country_id');

       $getTheLastLoginIp = $this->getTheLastLoginIp(); // get last login ip
       $role_id = 1; // role id for student
       $login_date = Carbon::now()->format('d-m-Y'); //last login date
       $user = User::create([
                    'name' => $f_name,
                    'email' => $email,
                    'password' => $hash_password,
                    'role_id' => $role_id,
                    'last_login_ip' => $getTheLastLoginIp,
                    'last_login_date' => date("Y-m-d", strtotime(trim($login_date))),
                ]);
         if($user){
            $mentor = Student::create([
                'first_name' => $f_name,
                'last_name' => $l_name,
                'email' => $email,
                'mobile'=> $mobile,
                'country_id'=> $country_id,
            ]);

             Session::forget('firstname');
             Session::forget('email');
             Session::forget('password');
             Session::forget('mobile');
             Session::forget('otp');
             Session::forget('country_id');
             Auth::login($user);
             return redirect('/student-profile');
         }
      }else{
        return redirect('/verifyotp')->with('error', 'Invalid OTP. Please enter valid OTP or press Resend button to receive new OTP');
      }
    }    

     
  public function fpassword()
    {  
      return view('web.home.fpassword');
    }  

    public function store(Request $request)
    {  

      $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'mobile' => 'required|digits:10',
            'email' => 'required|email|unique:users|max:255',
        ]);
      $params = $request->input();
      //dd($params);
       if($params['county_id'] == 106){
          // if(isset($params['g-recaptcha-response'])){
      //     $captcha=$params['g-recaptcha-response'];
      //     $secretKey = "6LdPGOkUAAAAAEf9Q9LTfkjbo-n3v1r1IU6b76En";
      //     $ip = $_SERVER['REMOTE_ADDR'];
      //     // post request to server
      //     $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
      //     $response = file_get_contents($url);
      //     $responseKeys = json_decode($response,true);
          // should return JSON with success as true
          // if($responseKeys["success"]) {

          Session::put('firstname', $request->f_name);
          Session::put('lasttname', $request->l_name);
          Session::put('email', $request->email);
          Session::put('password', $request->password);
          Session::put('mobile', $request->mobile);
          Session::put('country_id', $request->county_id);
     
          $apiKey = urlencode('grgpALgWAbk-MfixOlCHHxz79kKeEIkN29PcsQsY8J');
  
          // Message details
          //$numbers = array(918284904441);
          $phone = $request->mobile;
          $code = 91;
          $phonewithCountrycode = (int)($code . $phone);
          $numbers = array();
          array_push($numbers,$phonewithCountrycode );
          $sender = urlencode('TXTLCL');
           
          $four_digit_random_number = mt_rand(1000,9999); 
          Session::put('otp', $four_digit_random_number);
          $message = rawurlencode('This is your otp '.$four_digit_random_number);
         
          $numbers = implode(',', $numbers);
         
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
         
          // Send the POST request with cURL
          $ch = curl_init('https://api.textlocal.in/send/');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          curl_close($ch);
          return redirect('/verifyotp');
          // }else {
          //  return redirect()->back()->with('error', 'You are spammer !');
          // }
          // }else{
          //   return redirect()->back()->with('error', 'Please check the the captcha form.');
          // }
         }else{

         $f_name = $params['f_name'];
         $l_name = $params['l_name'];
         $mobile = $params['mobile'];
         $password = $params['password'];
         $hash_password =  Hash::make($password);
         $email = $params['email'];
         $country_id = $params['county_id'];
         $getTheLastLoginIp = $this->getTheLastLoginIp(); // get last login ip
         $role_id = 1; // role id for student
         $login_date = Carbon::now()->format('d-m-Y'); //last login date
         $user = User::create([
                      'name' => $f_name,
                      'email' => $email,
                      'password' => $hash_password,
                      'role_id' => $role_id,
                      'last_login_ip' => $getTheLastLoginIp,
                      'last_login_date' => date("Y-m-d", strtotime(trim($login_date))),
                  ]);
         if($user){
            $student = Student::create([
                'first_name' => $f_name,
                'last_name' => $l_name,
                'email' => $email,
                'mobile'=> $mobile,
                'country_id'=> $country_id,
            ]);
             Auth::login($user);
             return redirect('/student-profile');

         }
        } 
      
  
//   // Process your response here
//   echo $response;

// dd("sdcsd");




    	// $params = $request->input();
    	// //dd($params['g-recaptcha-response']);
     //   $request->validate([
     //        'f_name' => 'required',
     //        'l_name' => 'required',
     //        'mobile' => 'required|digits:10',
     //        'email' => 'required|email|unique:users|max:255',
     //    ]);


     //   if(isset($params['g-recaptcha-response'])){
     //      $captcha=$params['g-recaptcha-response'];
     //      $secretKey = "6LdPGOkUAAAAAEf9Q9LTfkjbo-n3v1r1IU6b76En";
     //      $ip = $_SERVER['REMOTE_ADDR'];
	    //     // post request to server
	    //   $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
     //    $response = file_get_contents($url);
     //    $responseKeys = json_decode($response,true);
     //    // should return JSON with success as true
     //    if($responseKeys["success"]) {
     //          $hash_password =  Hash::make($request->password);
     //          $getTheLastLoginIp = $this->getTheLastLoginIp(); // get last login ip
     //          $role_id = 1; // role id for student
     //          $login_date = Carbon::now()->format('d-m-Y'); //last login date
		   //     $user = User::create([
		   //              'name' => $request->f_name,
		   //              'email' => $request->email,
		   //              'password' => $hash_password,
		   //              'role_id' => $role_id,
		   //              'last_login_ip' => $getTheLastLoginIp,
		   //              'last_login_date' => date("Y-m-d", strtotime(trim($login_date))),
		   //          ]);
     //    } else {
     //    	return redirect()->back()->with('error', 'You are spammer !');
     //    }
     //    }else{
     //      return redirect()->back()->with('error', 'Please check the the captcha form.');
     //    }

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
    public function signin($slug=null)
    {  
      if(empty($slug)){
        $user = auth()->user();
        if($user == null){
          $data['type'] = $slug;
        	return view('web.home.signin',$data);
        }elseif($user->role_id == 1){
        	return redirect()->route('student-home');
              //$this->redirectTo = '/student_admin';
        }else{
          	return redirect()->route('mentor-home');
        }
      } else{
          $user = auth()->user();
          if($user == null){
            $data['type'] = $slug;
            return view('web.home.signin',$data);
          } 
      }

    }
  

}
