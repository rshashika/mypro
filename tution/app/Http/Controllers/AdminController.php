<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\admin;
use App\student;
use App\payments;
use App\tution;
use App\teacher;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function login(Request $request){
      if($request->isMethod('post')){
        $data = $request->input();
       // $adminCount =1;
        $adminCount = admin::where(['username' => $data['username'],'password'=>md5($data['password']),'status'=>1])->count(); 
         if ($adminCount > 0) {
                    //echo "Success"; die;
                   Session::put('adminSession', $data['username']);
                    return redirect('/admin/dashboard');
          }else{
                    //echo "failed"; die;
                    return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
          }
      }
      return view('admin.admin_login');
    }

    public function dashboard(){
        /*if(Session::has('adminSession')){
            // Perform all actions
        }else{

            //return redirect()->action('AdminController@login')->with('flash_message_error', 'Please Login');
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/
         $students = student::where('is_deleted',0)->get();
          $classes = tution::all();
          $teachers= teacher::all();
       //  $cashtoday=payments::where('payment_date', '>', $today)->get(); 
          $today = Carbon::today();
          //echo $today; die;
         $cashtoday = DB::table('payments')
           // ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('payment_date',$today)
            ->sum('total');

        return view('admin.dashboard')->with(compact('students','cashtoday','classes','teachers'));
    }

    public function settings(){

        $adminDetails = admin::where(['username'=>Session::get('adminSession')])->first();

       // echo "<pre>"; print_r($adminDetails); die;

        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count(); 
            if ($adminCount == 1) {
                //echo '{"valid":true}';die;
                echo "true"; die;
            } else {
                //echo '{"valid":false}';die;
                echo "false"; die;
            }

    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $adminCount = Admin::where(['username' => Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();

            if ($adminCount == 1) {
                // here you know data is valid
                $password = md5($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password updated successfully.');
            }else{
                return redirect('/admin/settings')->with('flash_message_error', 'Current Password entered is incorrect.');
            }

            
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logged out successfully.');
       
    }

    public function viewAdmins(){
        $admins = Admin::get();
        /*$admins = json_decode(json_encode($admins));
        echo "<pre>"; print_r($admins); die;*/
        return view('admin.admins.view_admins')->with(compact('admins'));
    }

    public function addAdmin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>";print_r($data); die;*/
            $adminCount = Admin::where('username',$data['username'])->count();
            if($adminCount>0){
                return redirect()->back()->with('flash_message_error','Admin / Sub Admin already exists! Please choose another.');
            }else{
                if(empty($data['status'])){
                    $data['status'] = 0;
                }
               // if($data['type']=="Admin"){
                    $admin = new Admin;
                    // $admin->branch = $data['branch'];
                    $admin->username = $data['username'];
                    $admin->password = md5($data['password']);
                    $admin->password_plain = $data['password'];
                    $admin->type = $data['type'];
                    $admin->status = $data['status'];
                    $admin->save();
                    return redirect('admin/view-admins')->with('smessage', 'Access Added Successfully');    
              //  }else if($data['type']=="Sub Admin"){

                    // if(empty($data['categories_view_access'])){
                    //     $data['categories_view_access'] = 0;
                    // }
                    // if(empty($data['categories_edit_access'])){
                    //     $data['categories_edit_access'] = 0;
                    // }
                    // if(empty($data['categories_full_access'])){
                    //     $data['categories_full_access'] = 0;
                    // }else{
                    //     if($data['categories_full_access']==1){
                    //         $data['categories_view_access'] = 1;
                    //         $data['categories_edit_access'] = 1;    
                    //     }    
                    // }

                    // if(empty($data['products_access'])){
                    //     $data['products_access'] = 0;
                    // }
                    // if(empty($data['orders_access'])){
                    //     $data['orders_access'] = 0;
                    // }
                    // if(empty($data['users_access'])){
                    //     $data['users_access'] = 0;
                    // }
                    // $admin = new Admin;
                    // $admin->type = $data['type'];
                    // $admin->username = $data['username'];
                    // $admin->password = md5($data['password']);
                    // $admin->status = $data['status'];
                   // $admin->categories_view_access = $data['categories_view_access'];
                  //  $admin->categories_edit_access = $data['categories_edit_access'];
                  //  $admin->categories_full_access = $data['categories_full_access'];
                  //  $admin->products_access = $data['products_access'];
                  //  $admin->orders_access = $data['orders_access'];
                   // $admin->users_access = $data['users_access'];
                    // $admin->save();
                    // return redirect()->back()->with('flash_message_success','Sub Admin added successfully!');     
              //  }
                
            }
        }
        return view('admin.admins.add_admin');
    }

    public function editAdmin(Request $request, $id){
       
        /*$adminDetails = json_decode(json_encode($adminDetails)); 
        echo "<pre>"; print_r($adminDetails); die;*/
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($id); die;
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            //if($data['type']=="Admin"){
               // Admin::where('id',$id)->update(['username',$data['username'],'password'=>md5($data['password']),'password_plane'=>$data['password'],'status'=>$data['status'],'branch',$data['branch']]);

                 Admin::where(['id'=>$id])
            ->update(['username'=>$data['username'],
                'password'=>md5($data['password']),
                'password_plane'=>$data['password'],
                'status'=>$data['status'],
                // 'branch'=>$data['branch']
            ]);

               return redirect('admin/view-admins')->with('smessage', 'Access Updated successfully');   
          ///  }else if($data['type']=="Sub Admin"){
                
              
                

        }
         $adminDetails = Admin::where('id',$id)->first();
        return view('admin.admins.edit_admin')->with(compact('adminDetails'));
    }
}
