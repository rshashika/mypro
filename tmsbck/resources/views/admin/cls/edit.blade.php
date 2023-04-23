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
            <h1>Class Information</h1>
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
         <div class="card card-primary">
          <!-- <div class="card-header">
            <h3 class="card-title">Class Information</h3>
          </div>
              -->
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-class/'.$levels->id) }}" name="add_student" id="add_student" > {{ csrf_field() }}
                
          <div class="card-body">
          <div class="row">
            <div class="col-md-6">                  
                
                  <div class="form-group">
                    <label>Time</label>
                     <input type="text" class="form-control" name="time" value="{{ $levels->time}}" required>
                  </div>
                    
                     <div class="form-group">
                    <label> Class Name</label>
                       <input type="text" class="form-control" name="subject" value="{{ $levels->subject}}" required >
                     </div>

                     <div class="form-group">
                    <label>Fees</label>
                       <input type="text" class="form-control" name="fees" value="{{ $levels->fees}}" required>
                     </div>

              </div> 

              <div class="col-md-6">


                <div class="form-group">
                    <label>Grade</label>
                    <input type="text" class="form-control" name="grade" value="{{ $levels->grade}}" required>
                </div>
                    
                   <div class="form-group">
                      <label> Teacher</label>
                   <select class="select2 form-control"  name="teacher[]" multiple="multiple" required >
                      <option value="">Select Teacher</option>
                       @foreach($teachrs as $teach)
                    <?php   $selected = explode(",", $levels->teacher); ?>
                      <option value="{{ $teach->id }}"{{ (in_array($teach->id, $selected)) ? 'selected' : '' }}>{{ $teach->first_name }} {{ $teach->last_name }}</option>
                        @endforeach
                     </select>
                   </div>

               
                     

              <div class="form-check">
               @php  $selectedr = explode(",", $levels->days);   @endphp
                <label class="form-label">Select Days</label><br>
                <input type="checkbox" name="day[]" id="day"  {{ (in_array("monday",$selectedr)) ? 'checked' :''}}  value="monday" class="form-check-input">
                 <label class="form-label">Monday</label><br>
                 <input type="checkbox" name="day[]" id="day" {{ (in_array("tuesday",$selectedr)) ? 'checked' :''}} value="tuesday" class="form-check-input">
                 <label class="form-label">Tuesday</label> <br>

                 <input type="checkbox" name="day[]" id="day" {{ (in_array("wednesday",$selectedr)) ? 'checked' :''}} value="wednesday" class="form-check-input">
                 <label class="form-label">Wednesday</label> <br>

                 <input type="checkbox" name="day[]" id="day" {{ (in_array("thursday",$selectedr)) ? 'checked' :''}} value="thursday" class="form-check-input">
                 <label class="form-label">Thursday</label> <br>

                 <input type="checkbox" name="day[]" id="day" {{ (in_array("friday",$selectedr)) ? 'checked' :''}} value="friday" class="form-check-input">
                 <label class="form-label">Friday</label><br>

                 <input type="checkbox" name="day[]" id="day" {{ (in_array("saturday",$selectedr)) ? 'checked' :''}} value="saturday" class="form-check-input">
                 <label class="form-label">Saturday</label><br>

                 <input type="checkbox" name="day[]" id="day"{{ (in_array("sunday",$selectedr)) ? 'checked' :''}} value="sunday" class="form-check-input">
                 <label class="form-label">Sunday</label>
              </div>
              </div>
            </div>
              </div>
              
      
               <div class="card-footer">
               <button type="submit" class="btn btn-primary btn-sm"><i class="ik save ik-save"></i>&nbsp;Update</button>
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

   