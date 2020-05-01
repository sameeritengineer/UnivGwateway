<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\MasterDegree;
use App\MasterService;
use App\Master_category;
use App\Master_service_price;
use App\Lead;
use App\Master_content;

class HomeController extends BaseController
{
    public function index()
    {  
      $data = [];	
      $mentors = Mentor::select('id','first_name','last_name','degree_program_id','major_specialization','job_title','detailed_bio','image')->where('status', 1)->orderByRaw('featured')->limit(8)->get();
      $category = Master_category::select('*')->where('status', 1)->orderByRaw('sort')->limit(9)->get();
      $data['mentors'] = $mentors; 	
      $data['category'] = $category; 	
      return view('web.home.index',$data);
    }

    public function contactus(){
        $data = [];	
     	return view('web.home.contactus',$data);
    }

    public function store(Request $request) {   
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

       $success = true;
       $dbError = [];
       $params = $request->input();
       try {

              $lead = Lead::create([
                'name' => trim($params['name']),
                'email' => trim($params['email']),
                'phone' => trim($params['phone']),
                'type' => 'contact us',
                'status' => '1',
                'message' => trim($params['message'])
            ]);

         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'There some error to contact with us.'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Thanks for contact with us, our team will contact you soon.');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }    

    }

    public function howitworks(){
        $data = []; 
      return view('web.home.how-it-works',$data);
    }

    public function aboutus(){
        $data = []; 
        $master_content = Master_content::where('content_type','about-us')->get();
        $data['about'] = $master_content;
      return view('web.home.about-us',$data);
    }

}
