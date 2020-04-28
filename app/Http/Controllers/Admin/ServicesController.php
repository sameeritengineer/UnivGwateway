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
        $services = MasterService::select('id','category_id','service_name','description')->get();
        $data['services'] = $services;
        return view('admin.services.index',$data);
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
    public function edit(MasterService $service)
    {
        //
        //dd($service);
        $data = [];
        $master_category = Master_category::select('id','name')->where('status',1)->get();
        $services = MasterService::select('id','service_name')->where('parent_id',0)->get();
        $service_price = Master_service_price::where('service_id',$service->id)->get();
        $data['master_category'] = $master_category;
        $data['services'] = $services;
        $data['service'] = $service;
        $data['service_price'] = $service_price;
        return view('admin.services.edit',$data);
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
        $params = $request->input();
     try {

               $serviceToBeUpdated = MasterService::find($id);
               //dd($libraryToBeUpdated);
               if ($request->hasFile('image'))
              {
                  $file      = $request->file('image');
                  $filename  = $file->getClientOriginalName();
                  $extension = $file->getClientOriginalExtension();
                  $picture   = date('His').'-'.$filename;
                  $uploadSuccess = $file->move(public_path('uploads/services'), $picture);
              }else{
                    $picture = $serviceToBeUpdated->image;
              }
                $updateFields = [
                'category_id' => $params['category_id'],
                'parent_id' => (empty($params['parent_id']))?0:$params['parent_id'],
                'service_type' => $params['service_type'],
                'service_name' => $params['name'],
                'deliverables' => $params['description'],
                'description' => $params['deliverables'],
                'gst_rate' => $params['gst_rate'],
                'sort' => (empty($params['sort']))?0:$params['sort'],
                'image'=>  $picture,
                    ];
                $update_value = $serviceToBeUpdated->update($updateFields);
                if($update_value){

                     /* update values for test score for mentor */
                     $price_text_list = $request->price_text_list;
                      foreach($price_text_list as $list){
                         if(!empty($list['service_price_id'])){
                               $ServicePriceUpdated = Master_service_price::find($list['service_price_id']);
                               $updateFieldsServicePrice = [
                                    'service_id' => $id,
                                    'text' => $list['price_text'],
                                    'quantity' =>$list['quantity'],
                                    'amount' => $list['price_amount'],
                                ];
                                $ServicePriceUpdated->update($updateFieldsServicePrice);
                         }else{
                                $master_service_price = Master_service_price::create([
                                                        'service_id' => $id,
                                                        'text' => $list['price_text'],
                                                        'quantity' => $list['quantity'],
                                                        'amount' => $list['price_amount'],
                                                     ]);
                         }
                       
                      }

    
                }

         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update Service'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Service Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }
    public function destroy(MasterService $service)
    {
      //return $service;
        $delete = $service->delete();
        if($delete){
          Master_service_price::where('service_id',$service->id)->delete();
        }
        return redirect()->back()->with('success','Service Deleted Succesfully');
    }

    public function delete_service_price(Request $request)
    {
        $id = $request->id;
        $delete_service_price = Master_service_price::where('id',$id)->delete();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
