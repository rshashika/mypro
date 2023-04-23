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
            <h1>Expenses</h1>
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

                <form action="{{ url('admin/add-feescat') }}" method="POST" id="createDeduction">
                    @csrf
                     <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 ">

                    <div class="form-group">
                        <label for="name">Fees Title</label><small class="text-danger">*</small>
                        <input type="text" name="fe_title" class="form-control" id="name"  required> 
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label><small class="text-danger">*</small>
                        <input type="text" name="amount" class="form-control" id="amount"  autocomplete="off">
                        
                    </div>
                </div>
                <div class="col-md-6 ">
                    
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" name="description" placeholder="Some description..."></textarea>
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
                                       <!--  <th>Date</th> -->
                                       <th>Title</th>
                                       <th>Amount</th>
                                       <th>Desc</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($expense as $class)
                                    <tr>
                                       <td>{{ $class->fe_title }}</td>
                                       <td>{{ $class->amount }}</td>
                                      <td>{{ $class->description }}</td>
                                       <td class="text-center">
                                          <div class="table-actions" style="text-align:center;"> 
                                             <a href="{{ url('/admin/edit-feescat/'.$class->id) }}" class="mr-2" >
                                             <i class='ik ik-edit-2 text-dark'></i>
                                             </a>
                                              <a rel="{{ $class->id }}" rel1="delete-feescat" href="javascript:" class="del cursure-pointer mr-2 deleteRecord" > <i class='ik ik-trash-2 text-danger'></i> </a>

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

      <!-- //////////////////////////////// -->


      </div>

<!--Avatar model-->

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




  
  $('#birthdate').datetimepicker({
    format: 'LL'
  });

 

});
</script>