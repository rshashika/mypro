<?php

namespace App\Http\Controllers;

use App\tution;
use Illuminate\Http\Request;
use App\teacher;
use DB;
use Carbon\Carbon;
use App\tutiondays;

class TutionController extends Controller
{

  
     public function dashboard(){
        /*if(Session::has('adminSession')){
            // Perform all actions
        }else{
            //return redirect()->action('AdminController@login')->with('flash_message_error', 'Please Login');
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/
        //echo "ggg";
        return view('admin.dashboard');
    }

    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if(empty($data['monday'])){
                $monday='0';
            }else{
                $monday='1';
            }
            if(empty($data['tuesday'])){
                $tuesday='0';
            }else{
                $tuesday='1';
            }
            if(empty($data['wednesday'])){
                $wednesday='0';
            }else{
                $wednesday='1';
            }
            if(empty($data['thursday'])){
                $thursday='0';
            }else{
                $thursday='1';
            }
            if(empty($data['friday'])){
                $friday='0';
            }else{
                $friday='1';
            }
            if(empty($data['saturday'])){
                $saturday='0';
            }else{
                $saturday='1';
            }
            if(empty($data['sunday'])){
                $sunday='0';
            }else{
                $sunday='1';
            }
            // if(empty($data['meta_title'])){
            //     $data['meta_title'] = "";    
            // }
            // if(empty($data['meta_description'])){
            //     $data['meta_description'] = "";    
            // }
            // if(empty($data['meta_keywords'])){
            //     $data['meta_keywords'] = "";    
            // }
            $category = new tution;
           $category->grade = $data['grade'];
            $category->teacher = implode(',', (array) $data['teacher']);
           $category->time = $data['time'];
             $category->subject = $data['subject'];
            $category->fees = $data['fees'];
            $category->days = implode(',', (array) $data['day']);
             // $category->monday=$monday;
             // $category->tuesday=$tuesday;
             // $category->wednesday=$wednesday;
             // $category->thursday=$thursday;
             // $category->friday=$friday;
             // $category->saturday=$saturday;
             // $category->sunday=$sunday;
            // $category->meta_description = $data['meta_description'];
            // $category->meta_keywords = $data['meta_keywords'];
            // $category->status = $status;
            $category->save();
            return redirect('admin/view-classes')->with('smessage', 'Added Successfully');
        }

       // $levels = teacher::get();
          $levels = teacher::where(['IsDeleted'=>0])->get();
        return view('admin.cls.add')->with(compact('levels'));
    }

    public function editCategory(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); */

            if(empty($data['monday'])){
                $monday='0';
            }else{
                $monday='1';
            }
            if(empty($data['tuesday'])){
                $tuesday='0';
            }else{
                $tuesday='1';
            }
            if(empty($data['wednesday'])){
                $wednesday='0';
            }else{
                $wednesday='1';
            }
            if(empty($data['thursday'])){
                $thursday='0';
            }else{
                $thursday='1';
            }
            if(empty($data['friday'])){
                $friday='0';
            }else{
                $friday='1';
            }
            if(empty($data['saturday'])){
                $saturday='0';
            }else{
                $saturday='1';
            }
            if(empty($data['sunday'])){
                $sunday='0';
            }else{
                $sunday='1';
            }
            // if(empty($data['meta_title'])){
            //     $data['meta_title'] = "";    
            // }
            // if(empty($data['meta_description'])){
            //     $data['meta_description'] = "";    
            // }
            // if(empty($data['meta_keywords'])){
            //     $data['meta_keywords'] = "";    
            // }
            // tution::where(['id'=>$id])->update(['grade'=>$data['grade'],'teacher'=>$data['teacher'],'time'=>$data['time'],'subject'=>$data['subject'],'fees'=>$data['fees'],'monday'=>$monday,'tuesday'=>$tuesday,'wednesday'=>$wednesday,'thursday'=>$thursday,'friday'=>$friday,'saturday'=>$saturday,'sunday'=>$sunday,]);
            // return redirect('admin/view-classes')->with('flash_message_success', 'Class has been updated successfully');
            tution::where(['id'=>$id])->update(['teacher'=>implode(',', (array) $data['teacher']),'subject'=>$data['subject'],'days'=>implode(',', (array) $data['day']),'grade'=>$data['grade'],'time'=>$data['time'],'fees'=>$data['fees']]);
            return redirect('admin/view-classes')->with('smessage', 'Updated successfully');
        }

        $levels = tution::where(['id'=>$id])->first();
        // $classes = DB::table('tutions')
        //    ->select('tutions.days')
        //    ->where('id',$id)
        //     ->get();
        //   //  print_r($classes); die;
        $teachrs = teacher::where(['IsDeleted'=>0])->get();
        return view('admin.cls.edit')->with(compact('levels','teachrs'));
    }

    public function deleteCategory($id = null){
        // tution::where(['id'=>$id])->delete();
        tution::where('id', $id)
          ->update(['IsDeleted' => 1]);
        return redirect('admin/view-classes')->with('dmessage', 'Class has been deleted successfully');
    }

    public function viewCategories(){ 


//          $classes = DB::table('tutions')
//            ->select('tutions.*')
//    // ->join('teachers', 'teachers.id', '=','tutions.teacher')
//     // $selected = explode(",", $levels->teacher);
//    // ->where('tutions.id',3)
//     ->get();
//     $newclses = [];
// foreach($classes as $cls){ 
//     $array = explode(",", $cls->teacher);
//         foreach ($array as $key) {
//             $newclses[] = DB::table('teachers')
//            ->select('teachers.first_name')
//    // ->join('teachers', 'teachers.id', '=','tutions.teacher')
//     // $selected = explode(",", $levels->teacher);
//     ->where('id',$key)
//     ->get();
//         }
     $classes = tution::where(['IsDeleted'=>0])->get();
  
// }  
        
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
            // $count=count($ds);
            // for ($i = 0; $i < $count; $i++){
                // $ds[$i];
              //  $ds=1;

                // if ($normalized_weekday == "monday" AND $value->monday=="1")  {

                //     $category = new tutiondays;
                //     $category->tution_code = $value->id;
                //     $category->tution_date = $start;
                //     $category->status = 1;
                //     $category->save();

                // } elseif ($normalized_weekday == "tuesday" AND $value->tuesday=="1") {
                //     $category = new tutiondays;
                //     $category->tution_code = $value->id;
                //     $category->tution_date = $start;
                //     $category->status = 1;
                //     $category->save();

                // }elseif($normalized_weekday == "wednesday" AND $value->wednesday=="1") {
                //    $category = new tutiondays;
                //     $category->tution_code = $value->id;
                //     $category->tution_date = $start;
                //     $category->status = 1;
                //     $category->save();

                // }elseif($normalized_weekday == "thursday" AND $value->thursday=="1"){
                //     $category = new tutiondays;
                //     $category->tution_code = $value->id;
                //     $category->tution_date = $start;
                //     $category->status = 1;
                //     $category->save();

                // }elseif($normalized_weekday == "friday" AND $value->friday=="1"){
                //     $category = new tutiondays;
                //     $category->tution_code = $value->id;
                //     $category->tution_date = $start;
                //     $category->status = 1;
                //     $category->save();

                // }elseif($normalized_weekday == "saturday" AND $value->saturday=="1"){
                //     $category = new tutiondays;
                //     $category->tution_code = $value->id;
                //     $category->tution_date = $start;
                //     $category->status = 1;
                //     $category->save();
                    
                // }elseif($normalized_weekday == "sunday" AND $value->sunday=="1"){
                //     $category = new tutiondays;
                //     $category->tution_code = $value->id;
                //     $category->tution_date = $start;
                //     $category->status = 1;
                //     $category->save();
                // }
          //   }

                 $category = new tutiondays;
                    $category->tution_code = $value->id;
                    $category->tution_date = $start;
                    $category->status = 1;
                    $category->save();

         }

       
       // echo $normalized_weekday ;
    }

    public function addExtra(Request $request)
    {
        //echo "string";
        if($request->isMethod('post')){
            $data = $request->all();

            $category = new tutiondays;
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
