@extends('layouts.adminLayout.admin_design')
@section('content')


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
            <h1>Add New Student </h1>
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
         <div class="card">
         <!--  <div class="card-header">
            <h3 class="card-title">Student Information</h3>
          </div> -->
             
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-student') }}" name="add_student" id="add_student" > {{ csrf_field() }}
                
          <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                 
                           
                  <div class="form-group">
                    <label>First Name</label>
                     <input type="text" class="form-control" name="fname" required>
                  </div>
                    
                     <div class="form-group">
                    <label>Last Name</label>
                       <input type="text" class="form-control" name="lname" required>
                     </div>

                     <div class="form-group">
                    <label>Date Of Birth</label>
                       <input type="date" class="form-control" name="dob" required>
                     </div>

                     <div class="form-group">
                    <label> Address</label>
                       <textarea class="form-control" name="address" required> </textarea>
                     </div>

                     <div class="form-group">
                    <label>Email </label>
                       <input type="email" class="form-control" name="email" >
                     </div>

                     <div class="form-group">
                    <label>Contact Num</label>
                       <input type="number" class="form-control" name="contact" required>
                     </div>


                     <div class="form-group">
                    <label>WhatsApp Num</label>
                       <input type="number" class="form-control" name="whatsapp" required>
                     </div>

                     
  

              </div> 

              <div class="col-md-6">

                  <div class="form-group">
                    <label>Admission Num</label>
                       <input type="number" class="form-control" name="admission" required>
                     </div>

                <div class="form-group">
                    <label>Parent Name</label>
                    <input type="text" class="form-control" name="parent_name">
                </div>

                <div class="form-group">
                    <label>Parent Mobile</label>
                    <input type="text" class="form-control" name="mobile" maxlength="10">
                </div>

                {{-- <div class="form-group">
                      <label> Branch</label>
                   <select class="select2 form-control"  name="branch" >
                      <option>Select Branch</option>
                      
                     </select>
                   </div> --}}

                <div class="form-group">
                <label class="form-label">Image</label>
                  <div id="uniform-undefined"><input name="image" id="image" type="file" class="form-control"></div>
                </div>
                    

              </div>
            </div>
          </div>
              
      
              <div class="card-footer">
               <button type="submit" class="btn btn-primary btn-sm"><i class="ik save ik-save"></i>&nbsp;Submit</button>
                <button onclick="history.back()" class="btn btn-outline-dark btn-sm"><i class="ik arrow-left ik-arrow-left"></i> Go Back</button>
              </div>
            </form>
              
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