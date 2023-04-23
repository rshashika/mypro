<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Expensecategory;
use App\Expense;
use DB;

class ExpenseController extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $category = new Expense;
            $category->expense_cat = $data['expense_cat'];
            $category->description = $data['description'];
            $category->date = $data['date'];
            $category->amount = $data['amount'];
            $category->branch_id=$data['branch'];
            $category->added_by=Session::get('adminDetails')['branch'];

            $category->save();
            return redirect('admin/add-expense')->with('smessage', 'Added successfully');
        }

        $expensecat = Expensecategory::where('IsDeleted',0)->get();
       // $expense = Expense::where('IsDeleted',0)->get();
         $expense = DB::table('expenses')
           ->select('expenses.*','expensecategories.ex_title')
    ->join('expensecategories', 'expensecategories.id', '=', 'expenses.expense_cat')
    ->where('expenses.IsDeleted',0)
    ->get();
        return view('admin.expense.expenseadd')->with(compact('expensecat','expense'));
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
        Expense::where('id', $id)
          ->update(['IsDeleted' => 1]);
        return redirect('admin/add-expense')->with('dmessage', 'Deleted successfully');
    }
}
