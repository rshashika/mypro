@extends('layouts.adminLayout.admin_design')
@section('content')
<style type="text/css">
    .overflow-visible{
        overflow: visible !important;
    }
    .modal-sm{
      width: auto;
      max-width: 356px !important;
    }
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<div class="content-wrapper">
  @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif   
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Payments </h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content">
    <div class="container-fluid">
         <div class="card ">
          <!-- <div class="card-header">
            <h3 class="card-title">Student Information</h3>
          </div> -->


                <form action="{{ url('admin/add-employeepayment') }}" method="POST" enctype="multipart/form-data" id="createAttendance">
                    @csrf
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 ">

                       <div class="form-group">
                        <label for="employee_id">Type</label><small class="text-danger">*</small>
                        <select class="form-control select2" name="type" id="typepay" required>
                          <option value="">Select Type</option>
                          @foreach($leaves as $key => $value)
                            <option value="{{$value->id}}">{{$value->type}}</option> 
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="employee_id">Select Member</label><small class="text-danger">*</small>
                        <select class="form-control select2" name="member_id" id="member_id" required>
                          <option value="">Select Member</option>
                          @foreach($teachers as $key => $tch)
                            <option value="{{$tch->id}}">{{$tch->first_name}}</option> 
                            @endforeach
                        </select>
                      </div>

                       <div class="form-group">
                        <label for="employee_id">Select Branch</label><small class="text-danger">*</small>
                        <input type="text" class="form-control" name="branch" id="branch" readonly>
                      </div>

                      
                      
                       
                    </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label for="date">Select Month</label><small class="text-danger">*</small>
                          <input type="month" class="form-control " name="month" id="month" required>
                          <small class="text-danger err" id="date-err"></small>
                        </div>

                         <div class="form-group">
                          <label for="date">Amount </label><small class="text-danger">*</small>
                          <input type="number" class="form-control " name="amount" id="amount" readonly>
                          <small class="text-danger err" id="date-err"></small>
                        </div>

                      
                      </div>
                    </div>
                </div>
                    <div class="card-footer">
                      <div class="col-md-12 col-lg-12 col-sm-12">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="ik save ik-save"></i> Submit</button>
                        <button onclick="history.back()" class="btn btn-outline-dark btn-sm"><i class="ik arrow-left ik-arrow-left"></i> Go Back</button>
                      </div>
                    </div>
                </form>
             </div>

                 <div class="card ">
                <div class="card-body">

                <table id="viewtbl" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                      <th>Teacher</th>
                                      <th>Type</th>
                                      <th>Branch</th>
                                      <th>Month</th>
                                      <th>Amount</th>
                                         <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($employeepayment as $pay)
                                    <tr>
                                      <td>{{ $pay->first_name}}</td>
                                       <td>{{ $pay->type }}</td>
                                       <td>{{ $pay->branch}}</td>
                                        <td>{{ date('F', strtotime($pay->month_for)) }}</td>
                                        <td>{{ $pay->amount}}</td>
                                       
                                      <td class="text-center">
                                          <div class="table-actions" style="text-align:center;"> 
                                             <!-- <a href="{{ url('/admin/edit-breakdeduct/'.$pay->id) }}" class="mr-2" >
                                             <i class='ik ik-edit-2 text-dark'></i>
                                             </a> -->
                                           
                                             <a  class="deleteRecord btn btn-danger btn-sm" rel="{{ $pay->id }}" rel1="delete-emppayment" href="javascript:" > <i class="fas fa-trash">
                                              </i> Delete</a>
                                          </div>
                                          
                                       </td> 
                                     
                                    </tr>
                                   @endforeach
                                 </tbody>
                                  
                              </table>
                          

          </div>

        </div>
        </div>
    </section>


      </div>

 
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  

<script type="text/javascript">

$(document).ready(function($) {

   

// $("#employee_id").select2();
<?php  if(Session::has('smessage')){ ?>
      Toast.fire({
        icon: 'success',
        title: '<?php echo session('smessage') ?>'
      })

      <?php }elseif(Session::has('emessage')){ ?>
         Toast.fire({
        icon: 'error',
        title: '<?php echo session('emessage') ?>'
      })
    <?php }elseif(Session::has('dmessage')){ ?>
         Toast.fire({
        icon: 'warning',
        title: '<?php echo session('dmessage') ?>'
      })
      <?php } ?>


 

});
</script>
