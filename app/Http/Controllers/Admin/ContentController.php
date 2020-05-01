<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Master_content;


class ContentController extends Controller
{
    public function index()
    {
        $data = [];
        $about = master_content::select('*')->where('content_type','about-us')->get();
        $data['about'] = $about;
        return view('admin.content.index',$data);
    }

   
    public function edit(Master_content $content, $id)
    {
        $data = [];
        $master_content = master_content::where('id',$id)->get()->first();
        $data['about'] = $master_content;
        return view('admin.content.edit',$data);
    }

  
    public function update(Request $request, $id)
    {
        //
        $success = true;
        $dbError = [];
        $params = $request->input();
     try {
               $serviceToBeUpdated = master_content::find($id);
                $updateFields = [
                  'name' => $params['name'],
                  'description' => $params['description']
                ];
                $update_value = $serviceToBeUpdated->update($updateFields);

         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update About Us'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','About Us Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }
}
