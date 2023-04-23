<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\teacher;
use App\tution;

class TeacherController extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

           
            $category = new teacher;
            $category->first_name = $data['fname'];
            $category->last_name = $data['lname'];
            $category->birth = $data['dob'];
            $category->address = $data['address'];
            // $category->branch = $data['branch'];
            $category->email = $data['email'];
            $category->contact = $data['contact'];
            $category->added=Session::get('adminDetails')['branch'];
           
            // $category->meta_description = $data['meta_description'];
            // $category->meta_keywords = $data['meta_keywords'];
            // $category->status = $status;
            $category->save();
            // return redirect()->back()->with('flash_message_success', 'Teacher has been added successfully');
            return redirect('admin/view-teachers')->with('smessage', 'Added successfully');
        }

        return view('admin.teachers.add');
    }

    public function delete($id = null){
        //tution::where(['id'=>$id])->delete();
          teacher::where('id', $id)
          ->update(['is_deleted' => 1]);
        return redirect()->back()->with('dmessage', 'Deleted successfully');
    }

    public function view(){ 

        $classes = teacher::where(['is_deleted'=>0])->get();
        return view('admin.teachers.view')->with(compact('classes'));
    }

    public function edit(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */

            teacher::where(['id'=>$id])
            ->update(['first_name'=>$data['fname'],
                'last_name'=>$data['lname'],
                'birth'=>$data['dob'],
                 // 'branch'=>$data['branch'],
                'address'=>$data['address'],
                'email'=>$data['email'],
                'added'=>Session::get('adminDetails')['branch'],
                'contact'=>$data['contact']]);

           // return redirect()->back()->with('flash_message_success', 'Teacher has been updated successfully');
            return redirect('admin/view-teachers')->with('smessage', 'Updated successfully');
        }

       // $categoryDetails = tution::where(['id'=>$id])->first();
        $levels = teacher::where(['id'=>$id])->first();
        return view('admin.teachers.edit')->with(compact('levels'));
    }
}
