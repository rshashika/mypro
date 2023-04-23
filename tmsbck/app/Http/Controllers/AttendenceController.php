<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\attendence;
use App\teacherattend;
use App\tution;
use App\User;
use App\teacher;
use App\payments;
use App\student;
use App\feestemp;
use App\tutiondays;
use App\studentsfees;
use App\studentincls;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class AttendenceController extends Controller
{
    
     public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;


            // $category = new attendence;
            // $category->grade = $data['grade'];
            // $category->teacher = $data['teacher'];
            // $category->time = $data['time'];
            //  $category->subject = $data['subject'];

            // $category->save();
            // return redirect()->back()->with('flash_message_success', 'Attendence has been added successfully');
        }

        $start=date('Y-m-d');
       //  $test = date('N', $start);
        $dt = Carbon::create($start);

        $week=$dt->isWeekday();
        if ($week) {
          //  echo "week";
        }
        $weeknd=$dt->isWeekend();
        if ($weeknd) {
           // echo "weeknd";
        }
        $tutiodys=tutiondays::get();
       // $classes = tution::get();
         $students = student::get();


         $classes = DB::table('tutions')
           ->select('tutions.*','teachers.first_name','teachers.last_name')
                ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
                ->get();
        // $today=date('Y-m-d', strtotime(date('Y-m')." -1 month"));
        // $year=date("Y",strtotime($today));
        // $month= date("m",strtotime($today));
        // $daysmonth=Carbon::now()->month($month)->daysInMonth;
       // $levels = attendence::get();
          $levels = DB::table('attendences')
           ->select('attendences.*','students.first_name','students.last_name')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->get();
        return view('admin.attendence.add')->with(compact('levels','tutiodys','classes','students'));
    }


    public function view(){ 
         $start=date('Y-m-d');
       // $classes = tution::get();
        $classes = DB::table('tutions')
           ->select('tutions.*','teachers.first_name','teachers.last_name','tutiondays.status','tutiondays.id As newid')
            ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
            ->join('tutiondays', 'tutiondays.tution_code', '=', 'tutions.id')
            ->where('tutiondays.tution_date',$start)
            ->get();

           // print_r($classes);
        return view('admin.attendence.view')->with(compact('classes'));
    }

     public function viewmore(Request $request){ 
         if($request->isMethod('post')){
             $data = $request->all();
       //  echo "<pre>"; print_r($data); 


        // $start=date('Y-m-d');
          $start=$data['date'];
           $student=$data['student'];
        //   $student=1220;
          $classid=$data['class_id'];
       //  $test = date('N', $start);
        $dt = Carbon::create($start);

        $week=$dt->isWeekday();
        if ($week) {
          //  echo "week";
        }
        $weeknd=$dt->isWeekend();
        if ($weeknd) {
           // echo "weeknd";
        }
       
       // $classes = tution::get();
        if ($student) { 

             if ($classid) { 

             $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->where('attendences.class',$classid)
            ->where('attendences.student_id',$student)
             ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            ->GROUPBY('student_id')
            ->get();

            }else{
                
              $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->where('attendences.student_id',$student)
            ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            ->GROUPBY('student_id')
            ->get();  
            }


            }else{

            if ($classid) { 

             $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->where('attendences.class',$classid)
             ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            ->GROUPBY('student_id')
            ->get();

            $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
             ->where('tution_code',$classid)
             ->get();

            }else{

              $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name','tutions.subject')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->join('tutions', 'tutions.id', '=', 'attendences.class')
            ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            ->GROUPBY('student_id')
            ->get();

            }

           }

            //   $levels = DB::table('attendences')
            // ->select('attendences.*','students.first_name','students.last_name')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('attendences.class',$classid)
            // ->where('attendences.student_id',$student)
            // ->get();
           $from = date('2022-09');
         $month= date("m",strtotime($from));
        // if ($start) { 
             // $tutiodys = tutiondays::where(['tution_date'=>$month])->get();
            // }else{
            //  $tutiodys=tutiondays::get();
            // }
      // $tutiodys = tutiondays::whereMonth('tution_date', '=', $month)->get();
         // 

         $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
             ->where('tution_code',$classid)
             ->get();
         // foreach ($levels  as $class) {
           // $result[] = [
              // $student_ids = $class->date;
                // $class_id[] = $class->id;
                // $term_id[] = $class->date;
          //  ];
         // }

        //  print_r($tutiodys);

              //  $nes=DB::table('attend')
              //   ->select('attend.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
        //->where('student_id',1220)
            // ->where('attendences.student_id',$student)
          //   ->get();

               

         //    $nes=DB::table('attend')
         //    ->select('attend.student_id')
         // //   ->GROUP_CONCAT(DISTINCT 'attend_date')
         //     ->selectRaw('GROUP_CONCAT(attend_date) as attend_dates')
         //    ->GROUPBY('student_id')
         //    ->get();


            // print_r($ppp);
            //SELECT student_id,GROUP_CONCAT(DISTINCT attend_date) FROM attend GROUP BY student_id;

             //   $department = Department::findOrFail($id);
                  
        // $today=date('Y-m-d', strtotime(date('Y-m')." -1 month"));
        // $year=date("Y",strtotime($today));
        // $month= date("m",strtotime($today));
        // $daysmonth=Carbon::now()->month($month)->daysInMonth;
       // $levels = attendence::get();
        return view('admin.attendence.viewmore')->with(compact('levels','tutiodys'));
    }
    }

    public function mark(Request $request,$id=null){ 
        

            $currentTime = Carbon::now();

       // $classdetails = tution::
        $classdetails =DB::table('tutions')
         ->select('tutions.*','teachers.first_name','teachers.last_name')
        ->where('tutions.id',$id)
        ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
        ->first();
        $students=student::get();
        return view('admin.attendence.edit')->with(compact('classdetails','students','currentTime'));
    }   

    public function markteacher(Request $request,$id=null){ 
        

            $currentTime = Carbon::now();

       // $classdetails = tution::
       // $classdetails =DB::table('tutions')
       //  ->select('tutions.*','teachers.first_name','teachers.last_name')
       // ->where('tutions.id',$id)
       // ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
       // ->first();
        $students=student::get();
        return view('admin.attendence.teacher')->with(compact('students','currentTime'));
    }

        public function getteacheratt(Request $request){
        $data = $request->all();
            $day=date('Y/m/d');
            $admin=Session::get('adminSession');
            $isteacher = teacher::where(['id'=>$data['teacher']])->count();

            if($isteacher==1)
            {
                //$studentincls = studentincls::where(['student'=>$data['student'],'class'=>$data['clas']])->count();

                // if($studentincls==1){

                $check = teacherattend::where(['teacher_id'=>$data['teacher'],'date'=>$day])->count();
                if ($check==0) {
                  $attend = new teacherattend;
                  //  $attend->student_id = $data['student'];
                  //  $attend->subject = $data['subject'];
                    $attend->teacher_id = $data['teacher'];
                  //  $attend->class = $data['clas'];
                    $attend->date = $day;
                     $attend->result = 1;
                     $attend->added_by=$admin;
                    $attend->save();

                    $month=date('Y-m', strtotime(date('Y-m')));
                 $classdetails = teacher::where(['id'=>$data['teacher']])->first();
                 // $adminCount = studentsfees::where(['student_code' =>$data['student'],'tution_code'=>$data['clas'],'month_for_pay'=>$month])->count(); 
                 //  echo json_encode($adminCount);
                 
                 $classdetails = json_decode($classdetails);
                    $classdetails->check =0;
                    $classdetails = json_encode($classdetails);

                 }else{
                    $month=date('Y-m', strtotime(date('Y-m')));
                    $classdetails = teacher::where(['id'=>$data['teacher']])->first();
             //  $adminCount = studentsfees::where(['student_code' =>$data['student'],'tution_code'=>$data['clas'],'month_for_pay'=>$month])->count(); 
              // echo json_encode($adminCount);
                 
                  $classdetails = json_decode($classdetails);
                    $classdetails->check =1;
                    $classdetails = json_encode($classdetails);

                 }

                      return $classdetails; die;
                  // }
                  // else{
                  //    echo json_encode("studentnotincls");
                  // }    
            }else{

                echo json_encode("notisteacher");
            }
         
    }

    public function getAjax(Request $request){
        $data = $request->all();
            $day=date('Y/m/d');
            $admin=Session::get('adminSession');
            $isteacher = student::where(['admission_num'=>$data['student']])->count();

            if($isteacher==1)
            {
                $studentincls = studentincls::where(['student'=>$data['student'],'class'=>$data['clas']])->count();

                if($studentincls==1){

                $check = attendence::where(['student_id'=>$data['student'],'subject'=>$data['subject'],'class'=>$data['clas'],'date'=>$day])->count();
                if ($check==0) {
                  $attend = new attendence;
                    $attend->student_id = $data['student'];
                    $attend->subject = $data['subject'];
                    $attend->teacher = $data['teacher'];
                    $attend->class = $data['clas'];
                    $attend->date = $day;
                     $attend->result = 1;
                     $attend->added_by=$admin;
                    $attend->save();

                    $month=date('Y-m', strtotime(date('Y-m')));
                 $classdetails = student::where(['admission_num'=>$data['student']])->first();
                  $adminCount = studentsfees::where(['student_code' =>$data['student'],'tution_code'=>$data['clas'],'month_for_pay'=>$month])->count(); 
                 //  echo json_encode($adminCount);
                 if ($adminCount == 1) {
                  $classdetails = json_decode($classdetails);
                $classdetails->paid =1;
                $classdetails = json_encode($classdetails);
                 } else {
                $classdetails = json_decode($classdetails);
                $classdetails->paid =0;
                    $classdetails = json_encode($classdetails);
                 }
                 $classdetails = json_decode($classdetails);
                    $classdetails->check =0;
                    $classdetails = json_encode($classdetails);

                 }else{
                    $month=date('Y-m', strtotime(date('Y-m')));
                    $classdetails = student::where(['admission_num'=>$data['student']])->first();
               $adminCount = studentsfees::where(['student_code' =>$data['student'],'tution_code'=>$data['clas'],'month_for_pay'=>$month])->count(); 
              // echo json_encode($adminCount);
                 if ($adminCount == 1) {
                      $classdetails = json_decode($classdetails);
                    $classdetails->paid =1;
                    $classdetails = json_encode($classdetails);
                 } else {
                    $classdetails = json_decode($classdetails);
                    $classdetails->paid =0;
                    $classdetails = json_encode($classdetails);
                 }
                  $classdetails = json_decode($classdetails);
                    $classdetails->check =1;
                    $classdetails = json_encode($classdetails);

                 }

                      return $classdetails; die;
                  }
                  else{
                     echo json_encode("studentnotincls");
                  }    
            }else{

                echo json_encode("notisteacher");
            }
         
    }

  

    public function changestatus(Request $request){

        $data = $request->all();
        $id=$data['id'];
        $status=$data['status'];
         // $temp = new feestemp;
         //     $temp->student_id = $data['student'];
         //     $temp->amount = $data['fees'];
         //     $temp->class =  $data['clas'];
         //     $temp->month_for =  $data['month'];

             $tmp= tutiondays::where(['id'=>$id])->update(['status'=>$status]);

             if($tmp){
                 echo "true"; die;
                 echo json_encode('1');
                 
             }else{
              //  echo "false"; die;
                 echo json_encode('0');        
             }

            //return $billtemptble; die;
             
             
    }

}
