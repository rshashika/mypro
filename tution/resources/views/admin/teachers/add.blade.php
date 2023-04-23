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
            <h1>Add Teacher </h1> 
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
          
             
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-teacher') }}" name="add_student" id="add_student" > {{ csrf_field() }}
                
          <div class="card-body">
          <div class="row">
            <div class="col-md-6">

                 {{-- <div class="form-group">
                      <label> Branch</label>
                   <select class="form-control select2" id="branch" name="branch" required>
                      <option value="">Select Branch</option>
                      <option value="PL">Pilimathalawa</option>
                      <option value="DA">Danthure</option>
                      <option value="MA"> Mahakanda</option>
                      <option value="NL"> Nillaba</option>
                     </select>
                   </div> --}}
                   
                           
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

                      

  

              </div> 

              <div class="col-md-6">

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


                    

              </div>
            </div>
          </div>
              
      <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm"><i class="ik save ik-save"></i> Save </button>
                 <button onclick="history.back()" class="btn btn-outline-dark btn-sm"><i class="ik arrow-left ik-arrow-left"></i> Go Back</button>
              </div>
            </form>
              
          </div>
        </div>
      </section>
      </div>
    <!-- </div>
  </div>
</div> -->



    
    
   
@endsection
 

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">

  $('#main_cat_id').on('change',function(e){
    console.log(e);
    var main_cat_id=e.target.value;
    $.get('/ajax-brands?main_cat_id='+main_cat_id,function(data){
      console.log(data);
      $('#brand_id').empty();
      $('#brand_id').append('<option value="0">Brand Name</option>');

      $.each(data,function(index,brandObj){
        $.('#brand_id').append('<option value="'+brandObj.brand_id+'">'+brandObj.brand_name+'</option>');
      });
    });
  });
</script> -->

   