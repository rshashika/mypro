<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\student;
use App\tution;
use App\studentincls;
use App\teacher;
use DB;

class ReportController extends Controller
{
    //

    public function view($value='')
    {
        return view('admin.reports.view_reports');
    }

    function viewStudentReport(){

            $student_data=student::where(['IsDeleted'=>0])->get();  
               $stud= json_decode($student_data);
               // print_r($stud);                  
          //  $student_data=DB::table('studentincls')->join('students','students.admission_num','=','studentincls.student')->get();  
        return view('admin.reports.view_product_report')->with(compact('student_data'));
    }

    function viewTeacherReport(){

            $teacherdata=teacher::where(['IsDeleted'=>0])->get();  
               $stud= json_decode($teacherdata);
               // print_r($stud);                  
          //  $student_data=DB::table('studentincls')->join('students','students.admission_num','=','studentincls.student')->get();  
        return view('admin.reports.view_teachers_report')->with(compact('teacherdata'));
    }

    function viewAttendReport(Request $request){
            if($request->isMethod('post')){
             $data = $request->all();
       // print_r($data); 


        // $start=date('Y-m-d');
          $start=$data['date'];
           $student=$data['student'];
        //   $student=1220;
          $classid=$data['class_id'];
       //  $test = date('N', $start);
       
       // $classes = tution::get();
        if ($student) { 

             if ($classid) { 

             $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->where('attendences.class',$classid)
            ->where('attendences.student_id',$student)
             ->selectRaw('GROUP_CONCAT(date) as attend_dates')
             ->GROUPBY('attendences.student_id')
            ->GROUPBY('attendences.class')
            ->get();

            }else{
                
              $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->where('attendences.student_id',$student)
            ->selectRaw('GROUP_CONCAT(date) as attend_dates')
             ->GROUPBY('attendences.student_id')
            ->GROUPBY('attendences.class')
            ->get();  
            }


            }else{

            if ($classid) { 

             $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->where('attendences.class',$classid)
             ->selectRaw('GROUP_CONCAT(date) as attend_dates')
             ->GROUPBY('attendences.student_id')
            ->GROUPBY('attendences.class')            ->get();

            $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
             ->where('tution_code',$classid)
               ->GROUPBY('tution_date')
             ->get();

            }else{

              $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name','tutions.subject')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->join('tutions', 'tutions.id', '=', 'attendences.class')
            ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            ->GROUPBY('attendences.student_id')
            ->GROUPBY('attendences.class')
            ->get();

            }

           }

            //   $levels = DB::table('attendences')
            // ->select('attendences.*','students.first_name','students.last_name')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('attendences.class',$classid)
            // ->where('attendences.student_id',$student)
            // ->get();
      //    $from = date('2022-09');
            $from=date('Y-m', strtotime($start));
            $month= date("m",strtotime($from));
             $year= date("Y",strtotime($from));
        ///echo $year;
            if ($start) {
               $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
           //  ->where('tution_date',$start)
             ->whereYear('tution_date',$year)
             ->whereMonth('tution_date', $month)
               ->GROUPBY('tution_date')
             ->get();
            }else{

                $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('tution_code',$classid)
               ->GROUPBY('tution_date')
             ->get();
            }
       //  print_r($tutiodys);
        $students = student::where(['IsDeleted'=>0])->get();
        $classes = DB::table('tutions')
           ->select('tutions.*','teachers.first_name','teachers.last_name')
                ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
                ->get();

              //  die;
        return view('admin.reports.view_attend_report')->with(compact('levels','tutiodys','classes','students','student','classid','start'));
          }  
          
          $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('tution_code',$classid)
              ->GROUPBY('tution_date')
             
             ->get();  

         $levels = DB::table('attendences')
            ->select('attendences.*','students.first_name','students.last_name','tutions.subject')
            ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            ->join('tutions', 'tutions.id', '=', 'attendences.class')
           ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            ->GROUPBY('attendences.student_id')
            ->GROUPBY('attendences.class')
            ->get();
             $students = student::where(['IsDeleted'=>0])->get();


         $classes = DB::table('tutions')
           ->select('tutions.*','teachers.first_name','teachers.last_name')
                ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
                ->get();
          //  print_r($levels);   
        // $today=date('Y-m-d', strtotime(date('Y-m')." -1 month"));
        // $year=date("Y",strtotime($today));
        // $month= date("m",strtotime($today));
        // $daysmonth=Carbon::now()->month($month)->daysInMonth;
       // $levels = attendence::get(); 
        return view('admin.reports.view_attend_report')->with(compact('levels','tutiodys','classes','students'));
    }

    function viewTeachAttendReport(Request $request){
            if($request->isMethod('post')){
             $data = $request->all();
       // print_r($data); 


        // $start=date('Y-m-d');
          $start=$data['date'];
           $teacher=$data['teacher'];
        //   $student=1220;
       //   $classid=$data['class_id'];
       //  $test = date('N', $start);
       
       // $classes = tution::get();
        if ($teacher) { 

            //  if ($classid) { 

            //  $levels = DB::table('attendences')
            // ->select('attendences.*','students.first_name','students.last_name')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('attendences.class',$classid)
            // ->where('attendences.student_id',$student)
            //  ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            //  ->GROUPBY('attendences.student_id')
            // ->GROUPBY('attendences.class')
            // ->get();

            // }else{
                
              $levels = DB::table('teacherattends')
            ->select('teacherattends.*','teachers.first_name','teachers.last_name')
            ->join('teachers', 'teachers.id', '=', 'teacherattends.teacher_id')
            ->where('teacherattends.teacher_id',$teacher)
            ->selectRaw('GROUP_CONCAT(date) as attend_dates')
             ->GROUPBY('teacherattends.teacher_id')
           // ->GROUPBY('attendences.class')
            ->get();  

          //  }


            // }else{

            // if ($classid) { 

            //  $levels = DB::table('attendences')
            // ->select('attendences.*','students.first_name','students.last_name')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('attendences.class',$classid)
            //  ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            //  ->GROUPBY('attendences.student_id')
            // ->GROUPBY('attendences.class')            ->get();

            // $tutiodys= DB::table('tutiondays')
            //  ->select('tutiondays.*')
            // // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            //  ->where('tution_code',$classid)
            //    ->GROUPBY('tution_date')
            //  ->get();

            // }else{

            //   $levels = DB::table('attendences')
            // ->select('attendences.*','students.first_name','students.last_name','tutions.subject')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->join('tutions', 'tutions.id', '=', 'attendences.class')
            // ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            // ->GROUPBY('attendences.student_id')
            // ->GROUPBY('attendences.class')
            // ->get();

            // }

           }

            //   $levels = DB::table('attendences')
            // ->select('attendences.*','students.first_name','students.last_name')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('attendences.class',$classid)
            // ->where('attendences.student_id',$student)
            // ->get();
      //    $from = date('2022-09');
            $from=date('Y-m', strtotime($start));
            $month= date("m",strtotime($from));
             $year= date("Y",strtotime($from));
        ///echo $year;
            if ($start) {
               $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
           //  ->where('tution_date',$start)
             ->whereYear('tution_date',$year)
             ->whereMonth('tution_date', $month)
               ->GROUPBY('tution_date')
             ->get();
            }else{

                $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('tution_code',$classid)
               ->GROUPBY('tution_date')
             ->get();
            }
       //  print_r($tutiodys);
        $teachers = teacher::where(['IsDeleted'=>0])->get();
        $classes = DB::table('tutions')
           ->select('tutions.*','teachers.first_name','teachers.last_name')
                ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
                ->get();

              //  die;
        return view('admin.reports.view_teachattend_report')->with(compact('levels','tutiodys','classes','teachers','teacher','start'));
          }  

          
          $tutiodys= DB::table('tutiondays')
             ->select('tutiondays.*')
            // ->join('students', 'students.admission_num', '=', 'attendences.student_id')
            // ->where('tution_code',$classid)
              ->GROUPBY('tution_date')
             
             ->get();  

         $levels = DB::table('teacherattends')
            ->select('teacherattends.*','teachers.first_name','teachers.last_name')
            ->join('teachers', 'teachers.id', '=', 'teacherattends.teacher_id')
           // ->join('tutions', 'tutions.id', '=', 'attendences.class')
           ->selectRaw('GROUP_CONCAT(date) as attend_dates')
            ->GROUPBY('teacherattends.teacher_id')
           // ->GROUPBY('attendences.class')
            ->get();
             $teachers = teacher::where(['IsDeleted'=>0])->get();


         // $classes = DB::table('tutions')
         //   ->select('tutions.*','teachers.first_name','teachers.last_name')
         //        ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
         //        ->get();
          //  print_r($levels);   
        // $today=date('Y-m-d', strtotime(date('Y-m')." -1 month"));
        // $year=date("Y",strtotime($today));
        // $month= date("m",strtotime($today));
        // $daysmonth=Carbon::now()->month($month)->daysInMonth;
       // $levels = attendence::get(); 
        return view('admin.reports.view_teachattend_report')->with(compact('levels','tutiodys','teachers'));
    }

}
