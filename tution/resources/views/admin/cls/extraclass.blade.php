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
          <div class="card-header">
            <h3 class="card-title"> Add Extra Classes </h3>
          </div>
             
             <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-extraclass') }}" name="add_Place" id="add_Place" >  {{ csrf_field() }}
                  
          <div class="card-body">
          <div class="row">

             <div class="col-md-6">
                 

                   <div class="form-group">
                <label class="form-label">Select Class</label>
                  <select name="class_id" id="class_id" class="form-control select2" required>
                <option value="0" disabled="true" selected="true">Select Class</option>
                 @foreach($classes as $key => $value)
                    <option value="{{$value->id}}">{{$value->subject}}</option>
                     @endforeach
                  </select>
                  </div>

                </div>
                <div class="col-md-6">

                   <div class="form-group">
                <label class="form-label">Select Date</label>
                  <input type="date" name="date" id="date" class="form-control" required>
                  </div>
                </div>

      
              <div class="form-actions">
                <input type="submit"  value="Add " class="btn btn-success btn-sm">
              </div>
            </div>
          </div>
            </form>
             
             


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
$( document ).ready(function() {

      // function onclickhandler(e) {
      //   alert("j");
      // }

    $('#amount').keyup(function(){
             //  var tr=$(this).parent().parent();
            
             // var discount=tr.find('.discount').val();
              //tr.find('.tt').val(subtot);
             // tr.find('.amount').val(subtotal);
              // alert("h");
               var tot = $('#tot').val();
                var pay = $('#amount').val();

              var bal= pay-tot;
              $('#balance').val(bal);
          //     var price=tr.find('.price').val();
          
          //     //var tot=(qty * price );
          //     var total= (qty * price)- (qty * price * discount)/100;
          //     tr.find('.total').val(total);
            
          //      subtotal();
          //     var discount=tr.find('.Discount').val();
          //     var amount=(total-discount);
          //     tr.find('.amount').val(amount);
          //     subamount();
               });
  });
   

  $('#tempadd').click(function() {
    var fees = $("#fees").val();
    var clas = $("#class_id").val();
    var student = $("#student").val();
    var month=$('#month').val();

    //if (fees||clas||student||month) {}
    //alert(current_pwd);
    $.ajax({
    //  type:'get',
      url:'/add-temp',
      data:{
       "_token": "{{ csrf_token() }}",
      fees:fees,clas:clas,student:student,month:month},
      headers: {
                "cache-control": "no-cache"
            },
            // data: {
            //     coupon_code: coupon_code
            // },
            type: 'post',
            dataType: 'json',
      success:function(resp){
        location.reload();

       // alert(resp);
        if(resp=='true'){
     //alert("hh");
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
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
    
     //   location.reload();
      },error:function(){
       // alert("Error");
        const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
         Toast.fire({
        icon: 'error',
        title: 'Please Enter the Details First.'
      })
      }
    });
  });
//});

</script>
   
@endsection
 




   