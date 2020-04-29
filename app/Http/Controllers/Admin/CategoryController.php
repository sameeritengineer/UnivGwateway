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


class CategoryController extends Controller
{
    public function index()
    {
        $data = [];
        $category = Master_category::select('*')->get();
        $data['category'] = $category;
        return view('admin.category.index',$data);
    }

    public function create()
    {
      $data = [];
      return view('admin.category.register',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
         $params = $request->input();
         $success = true;
         $dbError = [];
         try {
           $master_category = Master_category::select('id','name')->where('name',trim($params['name']))->get();
           if(count($master_category) == 0){
                $picture = '';
                if ($request->hasFile('image')) {
                      $file      = $request->file('image');
                      $filename  = $file->getClientOriginalName();
                      $extension = $file->getClientOriginalExtension();
                      $picture   = date('His').'-'.$filename;
                      $uploadSuccess = $file->move(public_path('uploads/category'), $picture);
                }
                Master_category::create([
                    'name' => $params['name'],
                    'desciption' => $params['description'],
                    'status' => $params['status'],
                    'sort' => (empty($params['sort']))?0:$params['sort'],
                    'image'=>  $picture,
                ]); 
           } else {
                $success = false;
                $dbError = [
                    'error' => 'Category already addedd',
                ];
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


    public function edit($id)
    {
        $data = [];
        $master_category = Master_category::select('*')->where('id',$id)->get() ->first();
        $data['category'] = $master_category;
        return view('admin.category.edit',$data);
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required',
        ]);
        $success = true;
        $dbError = [];
        $params = $request->input();
     try {
               $categoryToBeUpdated = Master_category::find($id);
               if ($request->hasFile('image'))
              {
                  $file      = $request->file('image');
                  $filename  = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture   = date('His').'-'.$filename;
                  $uploadSuccess = $file->move(public_path('uploads/category'), $picture);
              }else{
                    $picture = $categoryToBeUpdated->image;
              }
                $updateFields = [
                    'name' => $params['name'],
                    'desciption' => $params['description'],
                    'status' => $params['status'],
                    'sort' => (empty($params['sort']))?0:$params['sort'],
                    'image'=>  $picture,
                ];
                 $categoryToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update category'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','category Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    public function destroy(Master_category $category)
    {
        if($category->id>0){
          Master_category::where('id',$category->id)->delete();
        }
        return redirect()->back()->with('success','Category Deleted Succesfully');
    }
}
