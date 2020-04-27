<?php

namespace App\Http\Controllers\Admin;
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


class ServicesController extends Controller
{
    public function index()
    {
        //
        $data = [];
        $mentors = MasterService::select('id','first_name','email','status')->get();
        $data['mentors'] = $mentors;
        return view('admin.mentor.index',$data);
    }

    public function create()
    {
      $data = [];
      $master_category = Master_category::select('id','name')->where('status',1)->get();
      $services = MasterService::select('id','service_name')->where('parent_id',0)->get();
      $data['master_category'] = $master_category;
      $data['services'] = $services;
      return view('admin.services.register',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);
         $params = $request->input();
         $success = true;
         $dbError = [];
         try {
           $picture = '';
            if ($request->hasFile('image')) {
                  $file      = $request->file('image');
                  $filename  = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture   = date('His').'-'.$filename;
                  $uploadSuccess = $file->move(public_path('uploads/services'), $picture);
            }
           $services = MasterService::create([
                'category_id' => $params['category_id'],
                'parent_id' => (empty($params['parent_id']))?0:$params['parent_id'],
                'service_type' => $params['service_type'],
                'service_name' => $params['name'],
                'deliverables' => $params['description'],
                'description' => $params['deliverables'],
                'gst_rate' => $params['gst_rate'],
                'sort' => (empty($params['sort']))?0:$params['sort'],
                'image'=>  $picture,
            ]); 
           if($services){
              /* insert values for test score for mentor */
              $price_text_list = $request->price_text_list;
              foreach($price_text_list as $list){
                $master_service_price = Master_service_price::create([
                    'service_id' => $services->id,
                    'text' => $list['price_text'],
                    'quantity' => $list['quantity'],
                    'amount' => $list['price_amount'],
                 ]);
              }
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                ];
            }
        
        if($success == true){
          return redirect()->back()->with('success','Service Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }
    }


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
    public function edit(Mentor $mentor)
    {
        //
        //dd($mentor);
        $data = [];
        $master_universities = MasterUniversity::select('id','name')->where('status',1)->get();
        $master_degree = MasterDegree::select('id','name')->where('status',1)->get();
        $master_country = MasterCountry::select('id','name')->where('status',1)->get();
        $master_skills = MasterSkill::select('id','name')->where('status',1)->get();
        $mentor_skill = MentorSkill::select('skill_id')->where('mentor_id',$mentor->id)->pluck('skill_id')->toArray();
        $master_test = MasterTest::select('id','name','max_score')->get();
        $mentor_test_score = MentorTestScore::where('mentor_id',$mentor->id)->get();
        $mentor_universities_applied_list = MentorUniversityAppliedList::where('mentor_id',$mentor->id)->get();
        $data['master_universities'] = $master_universities;
        $data['master_degree'] = $master_degree;
        $data['master_country'] = $master_country;
        $data['mentor'] = $mentor;
        $data['mentor_skill'] = $mentor_skill;
        $data['master_skills'] = $master_skills;
        $data['master_test'] = $master_test;
        $data['mentor_test_score'] = $mentor_test_score;
        $data['mentor_universities_applied_list'] = $mentor_universities_applied_list;
        return view('admin.mentor.edit',$data);
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
        $success = true;
        $dbError = [];
     try {

               $mentorToBeUpdated = Mentor::find($id);
               //dd($libraryToBeUpdated);
               if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('uploads/mentor'), $picture);
              }else{
                    $picture = $mentorToBeUpdated->image;
              }
                $updateFields = [
                'first_name' => $request->name,
                'last_name' => $request->lname,
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
                    ];
                $update_value = $mentorToBeUpdated->update($updateFields);
                if($update_value){
                    /* insert values for mentor  skills */
                    $delete_mentor_skills = MentorSkill::where('mentor_id',$id)->delete();
                    $skills = $request->mentor_skills;
                    if(!empty($skills)){
                      foreach($skills as $skill){
                         $create_mentor_skills = MentorSkill::create([
                            'mentor_id' => $id,
                            'skill_id' => $skill,
                         ]);
                       }
                     }
                     /* update values for test score for mentor */
                     $test_score_list = $request->test_score_list;
                      foreach($test_score_list as $list){
                         if(!empty($list['mentor_test_score_id'])){
                               $MentorTestScoreToBeUpdated = MentorTestScore::find($list['mentor_test_score_id']);
                               $updateFieldsMentorTestScore = [
                                    'mentor_id' => $id,
                                    'test_id' => $list['test_name'],
                                    'test_year' =>date("Y-m-d", strtotime(trim($list['test_year'])) ),
                                    'score' => $list['test_score'],
                                    'max_score' => $list['test_max_score'],
                                ];
                                $MentorTestScoreToBeUpdated->update($updateFieldsMentorTestScore);
                         }else{
                                $create_mentor_testscore = MentorTestScore::create([
                                    'mentor_id' => $id,
                                    'test_id' => $list['test_name'],
                                    'test_year' =>date("Y-m-d", strtotime(trim($list['test_year'])) ),
                                    'score' => $list['test_score'],
                                    'max_score' => $list['test_max_score'],
                                 ]);
                         }
                       
                      }
                    /* update values for apllied universities for mentor */
                    $applied_universities = $request->applied_university_list;
                    foreach($applied_universities as $list){
                      if(!empty($list['mentor_applied_university_id'])){
                        $MentoruniversityAppliedToBeUpdated = MentorUniversityAppliedList::find($list['mentor_applied_university_id']);
                       $updateFieldsMentoruniversityApplied = [
                            'mentor_id' => $id,
                            'university_id' => $list['applied_university_id'],
                            'year_applied' =>date("Y-m-d", strtotime(trim($list['applied_university_year'])) ),
                            'application_status' => $list['applied_status'],
                        ];
                        $MentoruniversityAppliedToBeUpdated->update($updateFieldsMentoruniversityApplied);
                        }else{
                          $create_mentor_appliedlist = MentorUniversityAppliedList::create([
                            'mentor_id' => $id,
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
                    'msg' => 'Can\'t Update mentor'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Mentor Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    public function delete_mentor_test_score(Request $request)
    {
        $id = $request->id;
        $delete_mentor_score = MentorTestScore::where('id',$id)->delete();
    }
    public function delete_mentor_applied_university(Request $request)
    {
        $id = $request->id;
        $delete_mentor_applied_university = MentorUniversityAppliedList::where('id',$id)->delete();
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
