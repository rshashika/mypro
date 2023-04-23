<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment_category;
use Session;


class PaymentCategoryController extends Controller
{
     public function addCat(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
        //     //echo "<pre>"; print_r($data); die;


            $category = new payment_category;
            $category->title = $data['title'];
            $category->amount = $data['amount'];
            $category->description = $data['description'];
            $category->added=Session::get('adminDetails')['branch'];
            $category->save();
        //      $category->subject = $data['subject'];
        //     // $category->meta_title = $data['meta_title'];
        //     // $category->meta_description = $data['meta_description'];
        //     // $category->meta_keywords = $data['meta_keywords'];
        //     // $category->status = $status;
            
             return redirect()->back()->with('smessage', 'Added successfully');
         }


        $leaves=payment_category::where('is_deleted',0)->get();
        
        return view('admin.payments.paycat')->with(compact('leaves'));
    }

     public function edit(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
           // echo "<pre>"; print_r($data); 
           // die;

            payment_category::where(['id'=>$id])
            ->update(['title'=>$data['title'],
                'description'=>$data['description'],
                'amount'=>$data['amount']]);

            return redirect('admin/add-paymentcat')->with('smessage', 'Updated Successfully');
        }

       // $classes = tution::where(['id'=>$id])->first();
        $classes = tution::get();
        $leaves = paymentcategory::where(['id'=>$id])->first();
        return view('admin.payments.editpaycat')->with(compact('leaves','classes'));
    }


     public function delete($id = null){
      //  attendence::where(['id'=>$id])->delete();
        payment_category::where('id', $id)
          ->update(['is_deleted' => 1]);
        return redirect('admin/add-paymentcat')->with('dmessage', 'Deleted successfully');
    }
}
