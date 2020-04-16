<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\User;
use App\Mentor;
use App\MasterUniversity;
use App\MasterDegree;
use App\MasterCountry;
use Carbon\Carbon;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        $mentors = Mentor::select('id','first_name','email','status')->get();
        $data['mentors'] = $mentors;
        return view('admin.mentor.index',$data);
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
    public function edit(Mentor $mentor)
    {
        //
        //dd($mentor);
        $data = [];
        $master_universities = MasterUniversity::select('id','name')->where('status',1)->get();
        $master_degree = MasterDegree::select('id','name')->where('status',1)->get();
        $master_country = MasterCountry::select('id','code')->where('status',1)->get();
        $data['master_universities'] = $master_universities;
        $data['master_degree'] = $master_degree;
        $data['master_country'] = $master_country;
        $data['mentor'] = $mentor;
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
            $mentorToBeUpdated->update($updateFields);
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
