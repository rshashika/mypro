<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Elocutionpayment;
use App\Elocutioncategory;
use App\teacher;
use DB;
use Illuminate\Support\Facades\Input;

class ElocutionpaymentController extends Controller
{
     public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if(empty($data['branch'])){
                $data['branch']='0';
            }
            //else{
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
            $category = new Elocutionpayment;
            $category->elocution_cat = $data['type'];
            // $category->description = $data['description'];
             $category->amount = $data['amount'];
             $category->member_id = $data['member_id'];
             $category->date = date('Y-m-d');
             $category->added_by =Session::get('adminDetails')['branch'];
             $category->branch = $data['branch'];
             $category->month_for = $data['month'];
            // $category->status = $status;
            $category->save();
            return redirect('admin/add-employeepayment')->with('smessage', 'Added successfully');
        }

         $leaves = Elocutioncategory::where('IsDeleted',0)->get();
    //  $employeepayment=Elocutionpayment::where('IsDeleted',0)->get();
       $teachers=teacher::where('IsDeleted',0)->get();
         $employeepayment= DB::table('elocutionpayments')
            ->select('elocutionpayments.*','teachers.first_name','elocutioncategories.type')
            ->join('teachers', 'teachers.id', '=', 'elocutionpayments.member_id')
            ->join('elocutioncategories', 'elocutioncategories.id', '=', 'elocutionpayments.elocution_cat')
        // ->where('studentsfees.month_for_pay','!=',$month)
            ->where('elocutionpayments.IsDeleted',0)
            ->get();
        return view('admin.elocution.elocpay')->with(compact('leaves','teachers','employeepayment'));
    }

     public function delete($id = null){
      //  attendence::where(['id'=>$id])->delete();
        Elocutionpayment::where('id', $id)
          ->update(['IsDeleted' => 1]);
        return redirect('admin/add-employeepayment')->with('dmessage', 'Deleted successfully');
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

    public function attribute(){
        $type=Input::get('id');
         // $main=MainCategory::get();
         $attributes=Elocutioncategory::where('id','=',$type)->get();

         return response()->json($attributes);
         // echo "<pre>"; print_r($attributes); die;
    }
    public function attributebrnch(){
        $type=Input::get('id');
         // $main=MainCategory::get();
         $attributes=teacher::where('id','=',$type)->get();

         return response()->json($attributes);
         // echo "<pre>"; print_r($attributes); die;
    }
}
