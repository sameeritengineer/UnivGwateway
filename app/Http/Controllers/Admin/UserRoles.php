<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserRole;

class UserRoles extends Controller
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
        $roles = UserRole::orderBy('id', 'asc')->get();
        $data['roles'] = $roles;
        return view('admin.user_role.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('admin.user_role.create');
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
        $params = $request->input();
        $success = true;
        $dbError = [];
        try {

        $userRoleExists = UserRole::where('name', $params['name'])->get()->first();

            if ($userRoleExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "User Role already exists"
                ];
            }else{
              $role = UserRole::create([
                'name' => trim($params['name']),
                'status' => trim($params['status'])
            ]);
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new Role'
                ];
            }
         //dd($dbError);
        if($success == true){
          return redirect()->back()->with('success','User Role Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
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
        $user_role = UserRole::where('id',$id)->first();
        $data = [];
        $data['user_role'] = $user_role;
        return view('admin.user_role.edit',$data);
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
        $params = $request->input();
        $success = true;
        $dbError = [];
     try {

               $userRoleToBeUpdated = UserRole::find($id);
                $updateFields = [
                'name' => trim($params['name']),
                'status' => trim($params['status'])
                    ];
                $userRoleToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update User Role'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success',' User Role Updated Succesfully');
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
