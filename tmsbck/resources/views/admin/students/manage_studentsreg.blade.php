@extends('layouts.adminLayout.admin_design')
@section('content')

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
</head>
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

         <form enctype="multipart/form-data" class="form-horizontal" method="post" action="#" name="add_Place" id="add_Place" novalidate="novalidate">  {{ csrf_field() }}
                  
          <div class="card-body">
          <div class="row">

             <div class="col-md-6">
                 
                  
               
                   <div class="form-group">
                <label class="form-label">Select Class</label>
                  <select name="clas" id="clas" class="form-control select2" >
                <option value="0" disabled="true" selected="true">Select Class</option>
                 @foreach($classes as  $value)
                    <option value="{{$value->id}}">{{$value->subject}}</option>
                     @endforeach
                  </select>
                  </div>

                </div>
                 <div  class="col md-6">
                     <div class="form-group">
                <label class="form-label">Select Fees Type</label>
                  <select name="fees_type" id="fees_type" class="form-control select2" >
                <option value="0" disabled="true" selected="true">Select Fees Type</option>
                    <option value="FREE_CARD">FREE CARD</option>
                   <option value="HALF_CARD">HALF CARD</option>
                   <option value="CHARGE">CHARGE</option>
                  </select>
                  </div>
                </div>

                {{-- <div class="col-md-6"> --}}

                    <input type="hidden" name="student" id="student" value="{{ $levels->admission_num}}">
                {{-- </div> --}}
                 </div>

              <div class="col-2 form-actions">
                <input type="button" id="tempadd" value="Update " class="form-control btn btn-success">
              </div>
           
          </div>
            </form>


            <div class="card-body">

                <table id="viewtbl" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>Student</th>
                                       <th>Class</th>
                                       <th>Fees</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($classdetails as $class)
                                 <tbody>
                                    <tr>
                                       <td>{{ $class->first_name }}</td>
                                       <td>{{ $class->grade." ".$class->subject }}</td>
                                       <td><select name="fees_type" id="fees_type" onchange="change_fees_type({{$class->id}},this.value);">
                                         <option value="FREE_CARD"@if(!empty($class->fees_type) && $class->fees_type=="FREE_CARD") selected @endif>FREE CARD</option>
                                          <option value="HALF_CARD"@if(!empty($class->fees_type) && $class->fees_type=="HALF_CARD") selected @endif>HALF CARD</option>
                                          <option value="CHARGE"@if(!empty($class->fees_type) && $class->fees_type=="CHARGE") selected @endif>CHARGE</option>

                                       </select></td>
                                       <td><a href="{{ url('/admin/delete-studentcls/'.$class->id) }}" class="btn btn-sm bg-success-light mr-2">
                                             <img src="https://img.icons8.com/fluency/25/000000/filled-trash.png"/>
                                             </a></td>
                                    </tr>
                                   
                                 </tbody>
                                  @endforeach
                              </table>
                          

          </div>
           <div class="card-footer">
               <a type="submit" href="{{ url('admin/add-paymentnew/'.$levels->id) }}" class="btn btn-danger btn-sm"><i class="ik ik-dollar-sign"></i>&nbsp; Payment</a>
 
              </div>

        </div>
        </div>
    </section>


      </div>

 <script type="text/javascript">

    $( document ).ready(function() {

       $('#tempadd').click(function() {

       // alert("F");

    var clas = $("#clas").val();
    var student = $("#student").val();
    var fees_type =$("#fees_type").val();

    //alert(current_pwd);
    $.ajax({
    //  type:'get',
      url:'/add-studentcls',
      data:{
       "_token": "{{ csrf_token() }}",
      clas:clas,student:student,fees_type:fees_type},
      headers: {
                "cache-control": "no-cache"
            },
            // data: {
            //     coupon_code: coupon_code
            // },
            type: 'post',
            dataType: 'json',
      success:function(resp){
        

       // alert(resp);
        if(resp=='success'){
     //alert("hh");
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
      Toast.fire({
        icon: 'success',
        title: 'Record Added.'
      })
        }else if(resp=="false"){
           const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
         Toast.fire({
        icon: 'error',
        title: 'Something Wrong.'
      })
    // alert("hh");
        }
    
       location.reload();
      },error:function(){
      //  alert("Error");
      }

    });

    });

   });


       
   </script>  
@endsection

