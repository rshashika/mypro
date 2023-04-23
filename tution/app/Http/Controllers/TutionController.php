<?php

namespace App\Http\Controllers;

use App\tution;
use Illuminate\Http\Request;
use App\teacher;
use Session;
use DB;
use Carbon\Carbon;
use App\tutionday;

class TutionController extends Controller
{
     public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            
            $category = new tution;
           $category->grade = $data['grade'];
            $category->teacher = implode(',', (array) $data['teacher']);
           $category->time = $data['time'];
             $category->subject = $data['subject'];
            $category->fees = $data['fees'];
            $category->days = implode(',', (array) $data['day']);
            $category->added=Session::get('adminDetails')['branch'];
           
            // $category->meta_description = $data['meta_description'];
            // $category->meta_keywords = $data['meta_keywords'];
            // $category->status = $status;
            $category->save();
            return redirect('admin/view-classes')->with('smessage', 'Added Successfully');
        }

       // $levels = teacher::get();
          $levels = teacher::where(['is_deleted'=>0])->get();
        return view('admin.cls.add')->with(compact('levels'));
    }

    public function editCategory(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */

          
            // if(empty($data['meta_title'])){
            //     $data['meta_title'] = "";    
            // }
                       // tution::where(['id'=>$id])->update(['grade'=>$data['grade'],'teacher'=>$data['teacher'],'time'=>$data['time'],'subject'=>$data['subject'],'fees'=>$data['fees'],'monday'=>$monday,'tuesday'=>$tuesday,'wednesday'=>$wednesday,'thursday'=>$thursday,'friday'=>$friday,'saturday'=>$saturday,'sunday'=>$sunday,]);
            // return redirect('admin/view-classes')->with('flash_message_success', 'Class has been updated successfully');
            tution::where(['id'=>$id])->update(['teacher'=>implode(',', (array) $data['teacher']),'subject'=>$data['subject'],'days'=>implode(',', (array) $data['day']),'grade'=>$data['grade'],'time'=>$data['time'],'fees'=>$data['fees']]);
            return redirect('admin/view-classes')->with('smessage', 'Updated successfully');
        }

        $levels = tution::where(['id'=>$id])->first();
      
        //   //  print_r($classes); die;
        $teachrs = teacher::where(['is_deleted'=>0])->get();
        return view('admin.cls.edit')->with(compact('levels','teachrs'));
    }

    public function deleteCategory($id = null){
        // tution::where(['id'=>$id])->delete();
        tution::where('id', $id)
          ->update(['is_deleted' => 1]);
        return redirect('admin/view-classes')->with('dmessage', 'Class has been deleted successfully');
    }

    public function viewCategories(){ 


//          $classes = DB::table('tutions')
//            ->select('tutions.*')
//    // ->join('teachers', 'teachers.id', '=','tutions.teacher')
//     // $selected = explode(",", $levels->teacher);
//    // ->where('tutions.id',3)
//     ->get();

     $classes = tution::where(['is_deleted'=>0])->get();

        
 //   print_r($newclses); die;
        return view('admin.cls.view')->with(compact('classes'));
    }


    public function updatedays()
    {
      //  echo "string";
       
        
       //  $test = date('N', $start);
        // $dt = Carbon::create($start);

        // $week=$dt->isWeekday();
        // if ($week) {
        //   //  echo "week";
        // }
        // $weeknd=$dt->isWeekend();
        // if ($weeknd) {
        //    // echo "weeknd";
        // }
         $tution=tution::get();
         $tution=json_decode($tution);
        // print_r($tution);

         foreach ($tution as  $value) {
            $start=date('Y-m-d');
             $timestamp = strtotime($start);
            $weekday= date("l", $timestamp );
            $normalized_weekday = strtolower($weekday);
              //  print_r($value->friday);
            // $ds=explode(",", $value->days);
           //  print_r($ds);


                 $category = new tutionday;
                    $category->tution_id = $value->id;
                    $category->tution_date = $start;
                    $category->status = 1;
                    $category->save();

         }

    }

    public function addExtra(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new tutionday;
            $category->tution_code = $data['class_id'];
            $category->tution_date = $data['date'];           
            $category->status = 1;
            $category->save();
          return redirect('admin/add-extraclass')->with('flash_message_success', 'Class has been added successfully');      
        }
         $classes=tution::get();
         return view('admin.cls.extraclass')->with(compact('classes'));
    }
}
