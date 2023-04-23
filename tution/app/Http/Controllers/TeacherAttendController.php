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

class TeacherAttendController extends Controller
{
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
}
