<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Session;
use App\admin;

class adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(empty(Session::has('adminSession'))){
            return redirect('/admin')->with('flash_message_error','Please Login to access ');
        }else{

             $adminDetails = Admin::where('username',Session::get('adminSession'))->first();
            $adminDetails = json_decode(json_encode($adminDetails),true);
            if($adminDetails['type']=="Admin"){
                // $adminDetails['superadmin']=1; 
                $adminDetails['branch']=1; 
                // $adminDetails['emp']=1; 
             //   $adminDetails['users_access']=1; 
            }elseif($adminDetails['type']=="Sub Admin"){
                //  $adminDetails['superadmin']=0; 
                // $adminDetails['admin']=0; 
                // $adminDetails['emp']=0; 
            }
            Session::put('adminDetails',$adminDetails);
            // echo "<pre>"; print_r(Session::get('adminDetails')); die;

            // Get Current Path
             $currentPath= Route::getFacadeRoot()->current()->uri();

            // if($currentPath=="admin/add-admin" || $currentPath=="admin/view-admins" && Session::get('adminDetails')['superadmin']==0){
            //     return redirect('/admin/dashboard')->with('flash_message_error','You have no access for Manage Admin');
            // }

            // if($currentPath=="admin/edit-student/{id}"  && Session::get('adminDetails')['admin']==0){
            //     // return redirect('/admin/dashboard')->with('flash_message_error','You have no access for this module');
            //     return back()->with('flash_message_error','You have no access for Manage Students');
            // }

            // if($currentPath=="admin/edit-teacher/{id}" || $currentPath=="admin/delete-teacher/{id}" && Session::get('adminDetails')['admin']==0){
            //     return back()->with('flash_message_error','You have no access for Manage Teachers');
            // }  

            // if($currentPath=="admin/add-attendence"  && Session::get('adminDetails')['admin']==0){
            //     return redirect('/admin/dashboard')->with('flash_message_error','You have no access for Manage Attendence');
            // } 

            // if($currentPath=="admin/edit-class/{id}" || $currentPath=="admin/delete-class/{id}"  && Session::get('adminDetails')['admin']==0){
            //     return back()->with('flash_message_error','You have no access for Manage Classes');
            // }  

        } 
        return $next($request);
    }
}
