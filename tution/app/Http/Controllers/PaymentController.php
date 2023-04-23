<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\tution;
use App\student;
use App\feestemp;
use Session;
use App\students_fees;
use App\payment_category;
use Illuminate\Support\Facades\Input;
use DB;

class PaymentController extends Controller
{
    //student registration payment
      public function new(Request $request,$id){
       // echo $id;
       //     die;
        $paycats = payment_category::where('is_deleted',0)->get();
        $student=student::where('id',$id)->first();
        // $billtemptble = 0;
         $month=date('Y-m', strtotime(date('Y-m')));
       
           //  $billtemptble = feestemp::get();
              $billtemptble = DB::table('feestemps')
            ->select('feestemps.*','payment_categories.title')
            ->join('payment_categories', 'payment_categories.id', '=', 'feestemps.class')
           // ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
           // ->where('studentin_classes.student', $stud)
            ->get();
         $billtemptble = json_decode(json_encode($billtemptble));
       //  $student=$id;
          //   $billtemptble = json_decode(json_encode($billtemptble));
        return view('admin.payments.newpay')->with(compact('paycats','student','billtemptble'));
    }

     public function attributepaytype(Request $request)
    {
         // $type=Input::get('id');
           $type = $request->id;
         // $class_id=Input::get('id');
         // $main=MainCategory::get();
          $attributes=payment_category::where('id','=',$type)->get();
       //  $attributes=tution::where('id','=',$class_id)->get();
         return response()->json($attributes);
         // echo "<pre>"; print_r($attributes); die;
    }

     public function UpdateRegPay(Request $request){
        $data = $request->all();
         $month=date('Y-m', strtotime(date('Y-m')));
        $stu=$data['student'];
         $temp = new feestemp;
             $temp->student_id = $data['student'];
             $temp->amount = $data['amount'];
             $temp->class =  $data['type'];
              $temp->added=Session::get('adminDetails')['branch'];
            $temp->month_for =  $month;
        //      $attend->result = 1;
        //     // $category->meta_title = $data['meta_title'];
        //     // $category->meta_description = $data['meta_description'];
        //     // $category->meta_keywords = $data['meta_keywords'];
        //     // $category->status = $status;
             // die;

             if($temp->save()){
                // echo "true"; die;
                echo json_encode('true');
               
             }else{
               // echo "false"; die;
                echo json_encode('false');   

             }
      // echo "<pre>"; print_r($data);
       // echo  $data['student'];
       // die;
        // $adminCount = tution::where(['id' =>$data['id']])->count(); 
        //     if ($adminCount == 1) {
        //         //echo '{"valid":true}';die;
        //       //  echo "true"; die;
        //     } else {
        //         //echo '{"valid":false}';die;
       //  echo "false"; die;
        //     }
        //     $classdetails = User::where(['id'=>1])->first();
            //  $billtemptble = feestemp::where(['student_id'=>$data['student']])->get();
      //  $billtemptble = json_decode(json_encode($billtemptble));

          // return $billtemptble; die;
          //  $this->Details();           
    }

    public function deletefees(Request $request, $id = null){
        if(!empty($id)){
            feestemp::where(['id'=>$id])->delete();
            return redirect()->back()->with('dmessage','Deleted Successfully!');
           // return redirect('admin/add-payment')->with('dmessage', 'Deleted successfully');
        }
    }


     public function addpayment(Request $request){
            if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
             $ReceiptNo = time();
            $person = feestemp::all();
             $pay = new payment;
             $pay->receipt_no = $ReceiptNo;
             $pay->student_id = $data['student'];
             $pay->payment_date = date('Y-m-d');
             $pay->payment_details =$person;
             $pay->total = $data['tot'];
             $pay->payment_res='Register';
             $pay->added = Session::get('adminDetails')['branch'];
             $pay->save();

            // $trans_id = DB::getPdo()->lastInsertId();

           // $trans = DB::table('billtemp')->get();

             // foreach($person as $pro){

             //     $Pro = new studentsfees;
             //     $Pro->student_code = $pro->student_id;
             //     $Pro->tution_code = $pro->class;
             //     $Pro->month_for_pay = $pro->month_for;
             //     $Pro->payment_date = date('Y-m-d');
             //    $Pro->fees = $pro->amount;
             //     $Pro->save();
             // }

        //         $getProductStock = ProductAttribute::where('sku',$pro->sku)->first();
               
          DB::table('feestemps')->delete();
          
        // }


          //  DB::table('cart')->where('user_email',$user_email)->delete();
            return redirect('/admin/view-students')->with('smessage','Student Registered Successfully!');   
      }
  } 

      public function viewPaymentsReg(){
      //  $pays = payments::get();     
        // $data = session()->all();
        // print_r($data); die;
        $pays = DB::table('payments')
                ->select('payments.*','students.first_name')
                ->join('students', 'students.admission_num', '=', 'payments.student_id')
               // ->join('studentsfees', 'studentsfees.student_code', '=', 'students.admission_num')
                ->where('payments.payment_res','Register')
                // ->where('studentsfees.tution_code','Paid')
                ->get();

        $pays = json_decode(json_encode($pays));

       // echo "<pre>"; print_r($brnd); die;
        return view('admin.payments.viewreg')->with(compact('pays'));
    }


     public function viewPaymentsmore(Request $request,$id=null){


        //$pays = payments::get();
          //  $pays = json_decode(json_encode($pays));
        //       $class = DB::table('payments')
        // ->select('tutions.*')
        // ->join('studentin_classes', 'studentin_classes.class', '=', 'tutions.id')
        // ->where('studentin_classes.student', $stud)
        // ->get();

         $class = payment::where(['id'=>$id])->first();
         //  $class = DB::table('payments')
         // ->select('payments.*')
         // ->join('tutions', 'tutions.id', '=', 'payments.payment_details->class')
         // ->where('payments.id', $id)
         // ->first();

       //  print_r($class); die;
         $payments = DB::table('payments')
        ->select('payments.*','students.first_name','students.last_name','students.admission_num','students.address')
        ->join('students', 'students.admission_num', '=', 'payments.student_id')
        ->where('payments.id', $id)
        ->first();

         $class = json_decode(json_encode($payments));     
        $payd=json_decode($class->payment_details);
         foreach ($payd as $key => $value) {
            // $subject=paymentcategory::where(['id'=>$value->class])->first();
             $subject=tution::where(['id'=>$value->class])->first();
            $payd[$key]->class=$subject->subject;
            }

       // echo "<pre>"; print_r($payd); die;
           //   $studn = student::where(['admission_num'=>$class->student_id])->first();
          //   $studn = json_decode(json_encode($studn));

           // echo "<pre>"; print_r($payments); die;
        return view('admin.payments.viewmore')->with(compact('payments','payd'));
    }

      public function add(Request $request){
        // if($request->isMethod('post')){
        //     $data = $request->all();
        //     //echo "<pre>"; print_r($data); die;

        //     // if(empty($data['status'])){
        //     //     $status='0';
        //     // }else{
        //     //     $status='1';
        //     // }
        //     // if(empty($data['meta_title'])){
        //     //     $data['meta_title'] = "";    
        //     // }
        //     // if(empty($data['meta_description'])){
        //     //     $data['meta_description'] = "";    
        //     // }
        //     // if(empty($data['meta_keywords'])){
        //     //     $data['meta_keywords'] = "";    
        //     // }
        //     $category = new payments;
        //     $category->grade = $data['grade'];
        //     $category->teacher = $data['teacher'];
        //     $category->time = $data['time'];
        //      $category->subject = $data['subject'];
        //     // $category->meta_title = $data['meta_title'];
        //     // $category->meta_description = $data['meta_description'];
        //     // $category->meta_keywords = $data['meta_keywords'];
        //     // $category->status = $status;
        //     $category->save();
        //     return redirect()->back()->with('flash_message_success', 'Category has been added successfully');
        // }

        $levels = tution::get();
        $students=student::get();
        // $billtemptble = 0;
        
           //  $billtemptble = feestemp::get();
              $billtemptble = DB::table('feestemps')
    ->select('feestemps.*','tutions.grade','tutions.subject')
    ->join('tutions', 'tutions.id', '=', 'feestemps.class')
   // ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
   // ->where('studentin_classes.student', $stud)
    ->get();
        $billtemptble = json_decode(json_encode($billtemptble));
         
     //   $billtemptble = json_decode(json_encode($billtemptble));
        return view('admin.payments.add')->with(compact('levels','students','billtemptble'));
    }

     public function class(Request $request){
      //  $stud=Input::get('stud');
          $stud = $request->stud;
         // $main=MainCategory::get();
        // $classes=tution::where('main_cat_id','=',$stud_id)->get();
        $classes = DB::table('tutions')
    ->select('tutions.*','teachers.first_name')
    ->join('studentin_classes', 'studentin_classes.class', '=', 'tutions.id')
    ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
    ->where('studentin_classes.student_id', $stud)
    ->get();
         return response()->json($classes);
    }

    public function attribute(Request $request){
        // $type=Input::get('id');
          $class_id=$request->id;
         // $main=MainCategory::get();
         // $attributes=paymentcategory::where('id','=',$type)->get();
         $attributes=tution::where('id','=',$class_id)->get();
         return response()->json($attributes);
         // echo "<pre>"; print_r($attributes); die;
    }


    public function getAjax(Request $request){
        $data = $request->all();
        $stu=$data['student'];
         $temp = new feestemp;
             $temp->student_id = $data['student'];
             $temp->amount = $data['fees'];
             $temp->class =  $data['clas'];
             $temp->month_for =  $data['month'];
             $temp->added = Session::get('adminDetails')['branch'];
        //      $attend->result = 1;
        //     // $category->meta_title = $data['meta_title'];
        //     // $category->meta_description = $data['meta_description'];
        //     // $category->meta_keywords = $data['meta_keywords'];
        //     // $category->status = $status;
             if($temp->save()){
                // echo "true"; die;
                 echo json_encode('true');
                 
             }else{
              //  echo "false"; die;
                 echo json_encode('false');        
             }
      //  echo "<pre>"; print_r($data);
       // echo  $data['student'];
        // die;
        // $adminCount = tution::where(['id' =>$data['id']])->count(); 
        //     if ($adminCount == 1) {
        //         //echo '{"valid":true}';die;
        //       //  echo "true"; die;
        //     } else {
        //         //echo '{"valid":false}';die;
       //  echo "false"; die;
        //     }
        //     $classdetails = User::where(['id'=>1])->first();
            //  $billtemptble = feestemp::where(['student_id'=>$data['student']])->get();
      //  $billtemptble = json_decode(json_encode($billtemptble));

           // return $billtemptble; die;
             $this->Details();
             
    }

     public function Details()
{
    
   // $billtemptble = feestemp::all();
       // $billtemptble = json_decode(json_encode($billtemptble));
         $billtemptble = DB::table('feestemps')
    ->select('feestemps.*','tutions.grade','tutions.subject')
    ->join('tutions', 'tutions.id', '=', 'feestemps.class')
   // ->join('teachers', 'teachers.id', '=', 'tutions.teacher')
   // ->where('studentincls.student', $stud)
    ->get();
     //   $billtemptble = json_decode(json_encode($billtemptble));
         $levels = tution::get();
        $students=student::get();
    return view('admin.payments.add')->with(compact('levels','students','billtemptble'));
    //return $billtemptble;
}

    
    public function addpaymentmon(Request $request){
            if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
             $ReceiptNo = time();
            $person = feestemp::all();
             $pay = new payment;
             $pay->receipt_no = $ReceiptNo;
             $pay->student_id = $data['student'];
             $pay->payment_date = date('Y-m-d');
             $pay->payment_details =$person;
             $pay->total = $data['tot'];
             $pay->added = Session::get('adminDetails')['branch'];
             $pay->payment_res='Monthly';
             $pay->save();

            // $trans_id = DB::getPdo()->lastInsertId();

           // $trans = DB::table('billtemp')->get();

             foreach($person as $pro){
                $today=date('Y-m-d');
                 $Pro = new students_fees;
                 $Pro->student_id = $pro->student_id;
                 $Pro->tution_id = $pro->class;
                 $Pro->month_for_pay = $pro->month_for;
                 $Pro->payment_date = date('Y-m-d');
                $Pro->fees = $pro->amount;
                 $Pro->added = Session::get('adminDetails')['branch'];
                 $Pro->save();
            //       studentsfees::where(['student_code'=>$data['student'],'month_for_pay'=>$pro->month_for])
            // ->update(['payment_date'=>$today,
            //     'fees'=>$pro->amount,
            //     'tution_code'=>'Paid',
            //     'added_by'=>Session::get('adminDetails')['branch']]);
             }

        //         $getProductStock = ProductAttribute::where('sku',$pro->sku)->first();
               
          DB::table('feestemps')->delete();
          
        // }


          //  DB::table('cart')->where('user_email',$user_email)->delete();
            return redirect('/admin/view-payment')->with('smessage','Bill Generated Successfully!');   
      }
  }


    public function viewPayments(){
      //  $pays = payments::get();     
        // $data = session()->all();
        // print_r($data); die;
        $pays = DB::table('payments')
                ->select('payments.*','students.first_name','students_fees.tution_id')
                ->join('students', 'students.admission_num', '=', 'payments.student_id')
                ->join('students_fees', 'students_fees.student_id', '=', 'students.admission_num')
                ->where('payments.payment_res','Monthly')
                // ->where('studentsfees.tution_code','Paid')
                ->get();

        $pays = json_decode(json_encode($pays));

       // echo "<pre>"; print_r($brnd); die;
        return view('admin.payments.view')->with(compact('pays'));
    }
}
