<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\feescat;
use DB;

class FeescatController extends Controller
{
    
    public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $category = new feescat;
            $category->fe_title = $data['fe_title'];
            $category->description = $data['description'];
            $category->amount = $data['amount'];

            $category->save();
            return redirect('admin/add-feescat')->with('smessage', 'Added successfully');
        }

        $expense = feescat::where('IsDeleted',0)->get();
        return view('admin.fees.add')->with(compact('expense'));
    }

    public function edit(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */


            feescat::where(['id'=>$id])->update(['fe_title'=>$data['fe_title'],'description'=>$data['description'],'amount'=>$data['amount'] ]);
            return redirect('admin/add-feescat')->with('smessage', 'Updated successfully');
        }

        $expensecat = feescat::where(['id'=>$id])->first();
         $expense = feescat::where('IsDeleted',0)->get();
        return view('admin.fees.edit')->with(compact('expensecat','expense'));
    }

    public function delete($id = null){
      //  attendence::where(['id'=>$id])->delete();
        feescat::where('id', $id)
          ->update(['IsDeleted' => 1]);
        return redirect('admin/add-feescat')->with('dmessage', 'Deleted successfully');
    }
}
