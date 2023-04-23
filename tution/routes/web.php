<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
    Route::match(['get','post'],'/admin','AdminController@login');

    //cron
    Route::get('/admin/updatedays','TutionController@updatedays');

 Route::group(['middleware' => ['adminlogin']], function () {
    
    Route::get('/admin/dashboard','AdminController@dashboard'); 
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get', 'post'],'/admin/update-pwd','AdminController@updatePassword');

     //students
    Route::match(['get', 'post'], '/admin/add-student','StudentController@add');
    Route::match(['get','post'],'/admin/view-students','StudentController@view');
    Route::match(['get', 'post'], '/admin/edit-student/{id}','StudentController@edit');
    Route::match(['get', 'post'], '/admin/delete-student/{id}','StudentController@delete');
    Route::get('/admin/delete-student-image/{id}','StudentController@deleteStudentImage');
    Route::match(['get', 'post'], '/admin/manage-student/{id}','StudentController@manage');
     Route::match(['get', 'post'], '/admin/manage-student_inreg/{id}','StudentController@managereg');

     Route::match(['get', 'post'], '/change-fees-type','StudentController@changefeestype');

    //class
    Route::match(['get', 'post'],'/add-studentcls','StudentController@stuincls');
     Route::match(['get', 'post'], '/admin/delete-studentcls/{id}','StudentController@deletetution');
    Route::get('/add/tution','TutionController@add'); 
    Route::match(['get', 'post'], '/admin/add-class','TutionController@addCategory');
    Route::match(['get', 'post'], '/admin/edit-class/{id}','TutionController@editCategory');
    Route::match(['get', 'post'], '/admin/delete-class/{id}','TutionController@deleteCategory');
    Route::get('/admin/view-classes','TutionController@viewCategories'); 

          //teacher
    Route::match(['get', 'post'], '/admin/add-teacher','TeacherController@add');  
    Route::match(['get', 'post'], '/admin/view-teachers','TeacherController@view'); 
    Route::match(['get', 'post'], '/admin/edit-teacher/{id}','TeacherController@edit');
    Route::match(['get', 'post'], '/admin/delete-teacher/{id}','TeacherController@delete');

        //sms
    Route::match(['get', 'post'],'/sendsms','StudentController@sendsms'); 

       //employee payment categories
    Route::match(['get', 'post'],'/admin/add-eloccate','ElocutioncategoryController@add');
    Route::match(['get', 'post'],'/admin/delete-eloccate/{id}','ElocutioncategoryController@delete');
    Route::match(['get', 'post'],'/admin/edit-eloccate/{id}','ElocutioncategoryController@edit');

           //employee payments
    Route::match(['get', 'post'],'/admin/add-employeepayment','ElocutionpaymentController@add');
    Route::match(['get', 'post'],'/admin/delete-emppayment/{id}','ElocutionpaymentController@delete');
    Route::match(['get', 'post'],'/admin/edit-employeepayment/{id}','ElocutionpaymentController@edit');
    Route::get('/json-loadpaymenttypes','ElocutionpaymentController@attribute');
     Route::get('/json-loadbranch','ElocutionpaymentController@attributebrnch');

        //expense category
    Route::match(['get', 'post'],'/admin/add-expensecat','ExpensecategoryController@add');
    Route::match(['get', 'post'],'/admin/edit-expensecat/{id}','ExpensecategoryController@edit');
    Route::match(['get', 'post'],'/admin/delete-expensecat/{id}','ExpensecategoryController@delete');

        //expense
    Route::match(['get', 'post'], '/admin/add-expense','ExpenseController@add');
    Route::match(['get', 'post'], '/admin/delete-expense/{id}','ExpenseController@delete');

        //fees category
    Route::match(['get', 'post'], '/admin/add-feescat','FeescatController@add');
    Route::match(['get', 'post'], '/admin/edit-feescat/{id}','FeescatController@edit');
    Route::match(['get', 'post'], '/admin/delete-feescat/{id}','FeescatController@delete');

 





    //attendence
    Route::match(['get', 'post'], '/admin/view-attendence','AttendenceController@add');
    Route::get('/admin/add-attendence','AttendenceController@view');
    Route::match(['get', 'post'], '/admin/mark-attendence/{id}','AttendenceController@mark');
    Route::match(['get', 'post'], '/check-attendence','AttendenceController@getAjax');
    Route::match(['get', 'post'], '/admin/view-moreattend','AttendenceController@viewmore');

    Route::match(['get', 'post'], '/change-cls-status','AttendenceController@changestatus');

    //teacherattend
    Route::get('/admin/add-attendenceteach','TeacherAttendController@markteacher');
    Route::match(['get', 'post'], '/check-attendenceteach','TeacherAttendController@getteacheratt');
     


    //payments
    Route::match(['get', 'post'], '/admin/add-payment','PaymentController@add'); 
    Route::match(['get', 'post'], '/admin/add-paymentinattend/{id}/{class}','PaymentsController@addpaymentattend'); 
    Route::match(['get', 'post'], '/admin/add-paymentnew/{id}','PaymentController@new');
    Route::match(['get', 'post'], '/admin/add-billpay','PaymentController@addpayment'); 

    Route::match(['get', 'post'], '/admin/add-paymentmon/{id}','PaymentsController@mon');
    Route::match(['get', 'post'], '/admin/add-billpaymon','PaymentController@addpaymentmon');
    Route::get('/admin/view-paymentmon','PaymentsController@viewPaymentsMon');
    Route::match(['get', 'post'], '/add-tempmon','PaymentsController@UpdateMonPay'); //monthly


     //studentregistration
    Route::match(['get', 'post'], '/add-tempreg','PaymentController@UpdateRegPay'); //newregistet

      Route::match(['get', 'post'], '/add-temp','PaymentController@getAjax');
    //view registration fees
    Route::get('/admin/view-paymentreg','PaymentController@viewPaymentsReg');

    //cron
    Route::get('/admin/deletetemppay','PaymentsController@delete_paymttbl');
    Route::get('/admin/addtemppay','PaymentsController@add_paymttbl');

    Route::match(['get', 'post'], '/admin/delete-feestemp/{id}','PaymentController@deletefees');
    
   
    Route::get('/admin/view-payment','PaymentController@viewPayments');
    Route::match(['get', 'post'], '/admin/view-morepaym/{id}','PaymentController@viewPaymentsmore');


    //payment Category
    Route::match(['get', 'post'], '/admin/add-paymentcat','PaymentCategoryController@addCat');
    Route::match(['get', 'post'], '/admin/delete-paymentcat/{id}','PaymentCategoryController@delete');
    Route::match(['get', 'post'], '/admin/edit-paymentcat/{id}','PaymentCategoryController@edit'); 






    // =======================================================================================================================/=

   // Route::match(['get', 'post'], '/admin/delete-class/{id}','PaymentsController@delete');
   Route::get('/admin/view-payments','PaymentsController@view');

    Route::get('/json-class','PaymentController@class');
    Route::get('/json-attribute','PaymentController@attribute');

    //get registraion fees
     Route::get('/json-attributepaytype','PaymentController@attributepaytype');
    
    Route::match(['get', 'post'], '/details','PaymentsController@Details');
     // Route::get('/admin/view-payments','PaymentsController@viewPayments');
     
    // Route::match(['get', 'post'], '/admin/add-extraclass','TutionController@addExtra');
    // Route::get('/admin/view-students','StudentController@view');
    // 
    


    // Admin/Sub-Admins View Route
    Route::get('/admin/view-admins','AdminController@viewAdmins');
    Route::match(['get','post'],'/admin/add-admin','AdminController@addAdmin');
    Route::match(['get','post'],'/admin/edit-admin/{id}','AdminController@editAdmin');

    Route::get('/admin/view-reports','ReportController@view');
    Route::get('/admin/view-students-report','ReportController@viewStudentReport');
    Route::get('/admin/view-teachers-report','ReportController@viewTeacherReport');
    Route::match(['get','post'],'/admin/view-attendence-report','ReportController@viewAttendReport');
     Route::match(['get','post'],'/admin/view-teachattendence-report','ReportController@viewTeachAttendReport');
 });

 Route::get('/logout','AdminController@logout');