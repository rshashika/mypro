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
use App\tutionday;
use App\students_fees;
use App\studentin_class;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class AttendenceController extends Controller
{
     public function view(){ 
         $start=date('Y-m-d');
       // $classes = tution::get();
        $classes = DB::table('tutions')
           ->select('tutions.*','teachers.first_name','teachers.last_name','tutiondays.status','tutiondays.id As newid')
            ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
            ->join('tutiondays', 'tutiondays.tution_id', '=', 'tutions.id')
            ->where('tutiondays.tution_date',$start)
            ->get();

           // print_r($classes);
        return view('admin.attendence.view')->with(compact('classes'));
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

             $tmp= tutionday::where(['id'=>$id])->update(['status'=>$status]);

             if($tmp){
                 echo "true"; die;
                 echo json_encode('1');
                 
             }else{
              //  echo "false"; die;
                 echo json_encode('0');        
             }

            //return $billtemptble; die;
             
             
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


      public function getAjax(Request $request){
        $data = $request->all();
            $day=date('Y/m/d');
            $admin=Session::get('adminSession');
            $isteacher = student::where(['admission_num'=>$data['student']])->count();

            if($isteacher==1)
            {
                $studentincls = studentin_class::where(['student_id'=>$data['student'],'class'=>$data['clas']])->count();

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
                     $attend->added=Session::get('adminDetails')['branch'];
                    $attend->save();

                    $month=date('Y-m', strtotime(date('Y-m')));
                 $classdetails = student::where(['admission_num'=>$data['student']])->first();
                  $adminCount = students_fees::where(['student_id' =>$data['student'],'tution_id'=>$data['clas'],'month_for_pay'=>$month])->count(); 
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
               $adminCount = students_fees::where(['student_id' =>$data['student'],'tution_id'=>$data['clas'],'month_for_pay'=>$month])->count(); 
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

                echo json_encode("notisstudent");
            }
         
    }
}
