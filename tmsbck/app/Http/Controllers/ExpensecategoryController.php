<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Expensecategory;
use DB;

class ExpensecategoryController extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $category = new Expensecategory;
            $category->ex_title = $data['ex_title'];
            $category->description = $data['description'];
         //   $category->date = $data['date'];

            $category->save();
            return redirect('admin/add-expensecat')->with('smessage', 'Added successfully');
        }

        $expense = Expensecategory::where('IsDeleted',0)->get();
        return view('admin.expense.add')->with(compact('expense'));
    }

    public function edit(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */


            Expensecategory::where(['id'=>$id])->update(['ex_title'=>$data['ex_title'],'description'=>$data['description'] ]);
            return redirect('admin/add-expensecat')->with('smessage', 'Updated successfully');
        }

        $expensecat = Expensecategory::where(['id'=>$id])->first();
         $expense = Expensecategory::where('IsDeleted',0)->get();
        return view('admin.expense.edit')->with(compact('expensecat','expense'));
    }

    public function delete($id = null){
      //  attendence::where(['id'=>$id])->delete();
        Expensecategory::where('id', $id)
          ->update(['IsDeleted' => 1]);
        return redirect('admin/add-expensecat')->with('dmessage', 'Deleted successfully');
    }

   
}
