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
         <!-- <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Class Information</h3>
          </div>
             
             <form enctype="multipart/form-data" class="form-horizontal" method="post" action="#" name="add_Place" id="add_Place" novalidate="novalidate">  {{ csrf_field() }}
                  
          
            </form>
             
             </div> -->
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"> </h3>
                <h5 class="widget-user-desc">{{ $currentTime->toDateString() }}</h5>
              </div>
              
              <div class="card-footer">
               
                <div class="input-group">
                    <input type="text" name="message" id="teachernum" placeholder="  Number ..." required class="form-control">
                    <span class="input-group-append">
                      <button type="submit" id="send" class="btn btn-danger">Mark</button>
                    </span>
                  </div> 
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
          <div class="col-md-6" id="stuname" >
            <!-- Widget: user widget style 1 -->
          

          </div>
        </div>
             

      </div>
          </section>  
      </div>
    <!-- </div>
  </div>
</div> -->

<script type="text/javascript">
  $(function(){

     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });

       });

  // function loadCategories() {
  //           $.ajax({
  //               url: "/details",
  //               type: 'GET',
  //               success: function(data){
  //                   console.log(data)
  //               }
  //           })
  //       }

   
   

  $('#send').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      // Toast.fire({
      //   icon: 'success',
      //   title: 'Please enter the Student Number.'
      // })
    var teacher = $("#teachernum").val();
     // var clas = $("#id").val();
     // var subject = $("#subject").val();
     // var teacher=$('#teacher').val();
     
    if (teacher==0) {
     // alert(student);
       const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'error',
        title: 'Please enter the Registered Number.'
      })
    }else{
  
   // alert(clas);
    $.ajax({
    //  type:'get',
      url:'/check-attendenceteach',
      data:{
       "_token": "{{ csrf_token() }}",
      teacher:teacher},
      headers: {
                "cache-control": "no-cache"
            },
            // data: {
            //     coupon_code: coupon_code
            // },
            type: 'post',
            dataType: 'json',
      success:function(resp){

     //  alert(resp);
      //var ims="{{ asset('images/students/small') }}";
       // var html = '<div class="card card-widget widget-user"><div class="widget-user-header bg-gradient-gray"><h3 class="widget-user-username">'+resp['first_name']+' '+resp.last_name+'</h3></div><div class="widget-user-image"><img class="img-circle elevation-2" src="'+ims+'/'+resp.Image+'" alt="User Avatar"></div><div class="card-footer"><div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i> Attendence Already Marked !</h5> </div></div></div>';
  
                
                 if (resp['check']==1) {
                //  var ims="{{ asset('images/students/small') }}";
                 var html = '<div class="card card-widget widget-user"><div class="widget-user-header bg-gradient-gray"><h3 class="widget-user-username">'+resp['first_name']+' '+resp.last_name+'</h3></div><div class="card-footer"><div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i> Attendence Already Marked !</h5> </div></div></div>';

                  $('#stuname').html(html);

              }else if(resp['check']==0){
               //  var ims="{{ asset('images/students/small') }}";
                var html = '<div class="card card-widget widget-user"><div class="widget-user-header bg-gradient-gray"><h3 class="widget-user-username">'+resp['first_name']+' '+resp['last_name']+'</h3></div><div class="card-footer"><div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Attendence Marked !</h5> </div></div></div>';

                   $('#stuname').html(html);
              }

      
                   

          // alert("hh");
              if (resp=="notisstudent") {
                var html = '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> Student Not Registered or Invalid Number</h5> </div>';

                   $('#stuname').html(html);
              }

                if (resp=="studentnotincls") {
                  var html = '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> Student Not Registered for this Class or Invalid Number</h5> </div>';

                   $('#stuname').html(html);
                }

     //   location.reload();
      },error:function(){
      //  alert("Error");
      }

    });
  }
  });
//});
</script>
   
@endsection
 




   