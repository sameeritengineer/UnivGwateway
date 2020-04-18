<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){

        //dd($request->all());
        $this->validateLogin($request);
        if (\Auth::attempt(['email' => $request->email,'password' => $request->password,'status' => 1])){
            $user = DB::table('users')->where('email',$request->email)->first();
            $role = DB::table('user_roles')->where('id',$user->role_id)->first();
            if($role->id == 1 && $role->status == 1){
                return redirect('/student-profile');
            }if($role->id == 2 && $role->status == 1){
                return redirect('/mentor_admin');
            }else{
                return redirect('/newhome');
            }
          }else{
            return redirect('/student-signin')->with('error', 'Invalid Email address or Password or User Not Active');
          }



        // if($role->id == 1 && $role->status == 1){
        //  if (\Auth::attempt(['email' => $request->email,'password' => $request->password])){
        //    return redirect('/student_admin');
        //   }else{
        //     return redirect('/student-signin')->with('error', 'Invalid Email address or Password');
        //   }
        // }else{
        //     return redirect('/student-signin')->with('error', 'Role is not active for this user');
        // }
        //return $this->sendFailedLoginResponse($request);

    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     //dd($request->all());
    //     $role = DB::table('user_roles')->where('id',$user->role_id)->first();
    //     if($user->role_id == 1 && $role->status == 1){
    //        $this->redirectTo = '/student_admin';
    //     }else{
    //         return 'role is inactive for student';
    //        // return redirect()->back()->with('error', 'role is inactive for student');
    //     }  

    //     // if($user->role_id == 2){
    //     //     $this->redirectTo = '/mentor_admin';
    //     // }elseif($user->role_id == 1){
    //     //     $this->redirectTo = '/student_admin';
    //     // }
    //     // else{
    //     //     $this->redirectTo = '/home';
    //     // }
    // }
}
