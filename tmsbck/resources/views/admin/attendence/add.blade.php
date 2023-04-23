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

      <!--   /////////////////////////////
 -->
     <section class="content">
    <div class="container-fluid">
         <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Class Information</h3>
          </div>

   <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/view-moreattend') }}" name="add_Place" id="add_Place" >  {{ csrf_field() }}
            
                  
          <div class="card-body">
          <div class="row">

             <div class="col-6">
                 
                  <div class="form-group">
                      <label> Select Student</label>
                   <select class="select2 form-control"  name="student"  id="student" required >
                    <option value="" >Student Ad Num </option>
                  @foreach($students as $stu )
                    <option value="{{$stu->admission_num}}">{{$stu->admission_num}}</option>
                     @endforeach
                       
                     </select>
                   </div>

              </div>
                <div class="col-6">
                   <div class="form-group">
                <label class="form-label">Select Class</label>
                  <select name="class_id"  class="form-control select2" required>
               <option value="" >Student Class </option>
                   @foreach($classes as $tution )
                    <option value="{{$tution->id}}">Gr {{$tution->grade}} - {{$tution->subject}} - {{$tution->first_name}}</option>
                     @endforeach
                   </select>
                  </div>
                </div>
             
                <div class="col-6">
                   <div class="form-group">
                <label class="form-label">Select Date</label>
                  <input type="month" name="date" id="date" class="form-control" required>
                  </div>
                </div>

                   
             
            </div>
            <!-- <div class="card-footer"> -->
               <input type="submit" id="tempadd" value="View " class="btn btn-success btn-sm">
           <!--  </div> -->
          </div>
            </form>


          </div>
        </div>
      </section>

 <!-- //////////////////////// -->
     

    <!-- /.content -->
    
  </div>
       
@endsection
