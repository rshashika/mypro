<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elocutioncategory;
use Session;
class ElocutioncategoryController extends Controller
{
     public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            // if(empty($data['status'])){
            //     $status='0';
            // }else{
            //     $status='1';
            // }
            // if(empty($data['meta_title'])){
            //     $data['meta_title'] = "";    
            // }
            // if(empty($data['meta_description'])){
            //     $data['meta_description'] = "";    
            // }
            // if(empty($data['meta_keywords'])){
            //     $data['meta_keywords'] = "";    
            // }
            $category = new Elocutioncategory;
            $category->type = $data['type'];
            $category->description = $data['description'];
             $category->amount = $data['amount'];
              $category->added_by = Session::get('adminDetails')['branch'];
           //  $category->fees = $data['fees'];
            // $category->days = implode(',', (array) $data['day']);
            // $category->meta_description = $data['meta_description'];
            // $category->meta_keywords = $data['meta_keywords'];
            // $category->status = $status;
            $category->save();
            return redirect('admin/add-eloccate')->with('smessage', 'Added successfully');
        }

         $leaves = Elocutioncategory::where('IsDeleted',0)->get();
      // $employee_ded = employee_deduct::get();
       /// $dedctlist=deduction::where('IsDeleted',0)->get();
      // $employee_ded = DB::table('employee_deducts')
    //        ->select('employee_deducts.*','employees.first_name','employees.last_name','deductions.name')
    // ->join('employees', 'employees.id', '=', 'employee_deducts.employee_id')
    // ->join('deductions', 'deductions.id', '=', 'employee_deducts.deduction_type')
    // ->where('employee_deducts.IsDeleted',0)
    // ->get();
        return view('admin.elocution.eloccate')->with(compact('leaves'));
    }

     public function delete($id = null){
      //  attendence::where(['id'=>$id])->delete();
        Elocutioncategory::where('id', $id)
          ->update(['IsDeleted' => 1]);
        return redirect('admin/add-eloccate')->with('dmessage', 'Deleted successfully');
    }

    public function edit(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */

            // if(empty($data['status'])){
            //     $status='0';
            // }else{
            //     $status='1';
            // }
            // if(empty($data['meta_title'])){
            //     $data['meta_title'] = "";    
            // }
            // if(empty($data['meta_description'])){
            //     $data['meta_description'] = "";    
            // }
            // if(empty($data['meta_keywords'])){
            //     $data['meta_keywords'] = "";    
            // }
            Elocutioncategory::where(['id'=>$id])
            ->update(['type'=>$data['type'],
                'amount'=>$data['amount'],
                'description'=>$data['description'],
                'added_by'=>Session::get('adminDetails')['branch']]);

           // return redirect()->back()->with('flash_message_success', 'Teacher has been updated successfully');
            return redirect('admin/add-eloccate')->with('smessage', 'Updated successfully');
        }

        $levels = Elocutioncategory::where(['id'=>$id])->first();
        $leaves = Elocutioncategory::where('IsDeleted',0)->get();
        return view('admin.elocution.edit')->with(compact('levels','leaves'));
    }
}
