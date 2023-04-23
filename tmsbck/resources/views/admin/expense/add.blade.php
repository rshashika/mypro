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

                <form action="{{ url('admin/add-expensecat') }}" method="POST" id="createDeduction">
                    @csrf
                     <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 ">

                    <div class="form-group">
                        <label for="name">Expense Title</label><small class="text-danger">*</small>
                        <input type="text" name="ex_title" class="form-control" id="name" placeholder="ex: Standard Deduction" required> 
                    </div>
                   <!--  <div class="form-group">
                        <label for="amount">Amount</label><small class="text-danger">*</small>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="ex: 200.00" autocomplete="off">
                        <small class="text-danger err" id="amount-err"></small>
                    </div> -->
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
                                       <th>Desc</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($expense as $class)
                                    <tr>
                                       
                                       <td>{{ $class->ex_title }}</td>
                                      <td>{{ $class->description }}</td>
                                       <td class="text-center">
                                          <div class="table-actions" style="text-align:right;"> 
                                             <a href="{{ url('/admin/edit-expensecat/'.$class->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit
                                             </a>
                                             <!--  <a rel="{{ $class->id }}" rel1="delete-expensecat" href="javascript:" class="btn btn-danger btn-sm deleteRecord" > <i class='ik ik-trash-2 text-danger'></i> Delete</a> -->
                                              <a  class="deleteRecord btn btn-danger btn-sm" rel="{{ $class->id }}" rel1="delete-expensecat" href="javascript:" > <i class="fas fa-trash">
                                              </i> Delete
                                             <!--  <img src="https://img.icons8.com/color-glass/20/000000/filled-trash.png"/>  -->
                                             </a>

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