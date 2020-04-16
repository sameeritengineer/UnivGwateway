<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAllowed', function($user,$allowed){
             $allowed = explode(':',$allowed);
             $role = DB::table('user_roles')->where('id',$user->role_id)->first();
             if(in_array($role->name,$allowed)){
                if($role->status == 1){
                    return true;
                }
             }
            //$role_id = $user->role_id;

            //$dd = array_intersect($allowed, $role);
            //dd($dd);
        });
        Gate::define('isAllowedStudent', function($user,$allowed){
             $allowed = explode(':',$allowed);
             $role = DB::table('user_roles')->where('id',$user->role_id)->first();
             if(in_array($role->name,$allowed)){
                if($role->status == 1){
                    return true;
                }
             }

            //$role_id = $user->role_id;

            //$dd = array_intersect($allowed, $role_id);
            //dd($dd);
        });

        //
    }
}
