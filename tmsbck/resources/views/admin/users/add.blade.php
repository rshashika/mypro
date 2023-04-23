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

  <section class="content">
    <div class="container-fluid">
         <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Class Information</h3>
          </div>
             
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-class') }}" name="add_Place" id="add_Place" novalidate="novalidate"> {{ csrf_field() }}
                
          <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                 
             
                
                  <div class="form-group">
                    <label>Time</label>
                     <input type="text" class="form-control" name="time">
                  </div>
                    
                     <div class="form-group">
                    <label>Subject</label>
                       <input type="text" class="form-control" name="subject">
                     </div>


                


             

              <!--  <div class="form-check">
                <input type="checkbox" name="status" id="status" value="1" class="form-check-input">
                 <label class="form-label">Enable</label>
              </div> -->
             

              </div> 

              <div class="col-md-6">


                <div class="form-group">
                    <label>Grade</label>
                    <input type="text" class="form-control" name="grade">
                </div>
                    
                   <div class="form-group">
                      <label> Teacher</label>
                   <select class="select form-control"  name="teacher" >
                                          <option>Select Teacher</option>
                                          <option value="1">A+</option>
                                          <option value="2">O+</option>
                                          <option value="3">B+</option>
                                          <option value="4">AB+</option>
                     </select>
                   </div>


                 
              <!--   <div class="form-group">
                <label class="form-label">Image</label>
                  <div id="uniform-undefined"><input name="image" id="image" type="file" class="form-control"></div>
                </div>
 -->
               
             


              </div>
              
      
              <div class="form-actions">
                <input type="submit" value="Add " class="btn btn-success btn-sm">
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

   