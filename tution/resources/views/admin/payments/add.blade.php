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
         <div class="row mb-2">
          <div class="col-sm-6">
            <h1 > Payments </h1>
          </div>

           </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content">
    <div class="container-fluid">
         <div class="card ">
             
             <form enctype="multipart/form-data" class="form-horizontal" method="post" action="#" name="add_Place" id="add_Place" >  {{ csrf_field() }}
                  
          <div class="card-body">
          <div class="row"> 

             <div class="col-md-6">

                  <div class="form-group">
                      <label> Select Student</label>
                   <select class="select2 form-control"  name="student" id="student" required onload="myFunction()">
                    <option value=" " selected="true" disabled="true"  ><h6>Student Ad Num </h6></option>
                   @foreach($students as $key => $value)
                    <option value="{{$value->admission_num}}">{{$value->admission_num}}</option>
                     @endforeach
                       
                     </select>
                   </div>

             
               
                   <div class="form-group">
                <label class="form-label">Select Class</label>
                  <select name="class_id" id="class_id" class="form-control select2" required>
                <option value="0" disabled="true" selected="true">Select Class</option>
                  </select>
                  </div>

                </div>
                <div class="col-md-6">

                   <div class="form-group">
                <label class="form-label">Select Month</label>
                  <input type="month" name="month" id="month" class="form-control" required>
                  </div>
                </div>

                   
             
                
                 <!--  <div class="form-group">
                    <label>Fees</label> -->
                     <input type="hidden" class="form-control fees" name="fees" id="fees">
                  <!-- </div> -->
                    


              
      
              <div class="form-actions">
                <input type="button" id="tempadd" value="Add " class="btn btn-success btn-sm">
              </div>
            </div>
          </div>
            </form>
             
             


          </div>
        </div>
      </section>
         <?php if($billtemptble!=null) {  ?>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
            <h3 class="card-title">View Bill Products</h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form class="form-horizontal" method="post" action="{{ url('/admin/add-billpaymon') }}" name="add_bill" id="add_bill"> 
            {{ csrf_field() }}
                <table id="viewtbl" class="table table-bordered table-striped">
                  <thead>
                <tr>
                 <!--  <th>Product Name</th>  -->
                  <th>Class </th>
                  <!-- <th>Price </th> -->
                  <th>Month</th>
                  <th>Total</th>
                 <th>Delete</th> 
                </tr>
              </thead>
              <tbody>

                <?php $total_amount = 0; ?>
                @foreach($billtemptble as $bill)
                <tr class="gradeX">
                 <!--  <td><input type="text" name="product_name"  value="{{$bill->id}}"readonly></td></td> -->
                  <td><input type="text" name="sku"  value="{{$bill->grade."-".$bill->subject}}"readonly></td>
               <!--  </td> -->
                 <!--  <td><input type="text" name="price"  value="{{$bill->amount}}"readonly></td> -->
                  <td>
                      <input type="text" name="sku"  value="{{ date('F', strtotime($bill->month_for)) }}" readonly>
                    <input type="hidden" name="student"  value="{{$bill->student_id}}"readonly>
                  </td> 
                  <td>
                  <input type="text" name="total" class="total" id="total"  value="{{ $bill->amount}}"readonly>
                  </td>
                    <?php //$tot=($bill->id * $bill->id); ?>
                 <td class="center"><a  href="{{ url('/admin/delete-feestemp/'.$bill->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure Delete  ?')">Delete</a></td> 
              </tr>
                <?php  $total_amount =$total_amount + ($bill->amount); ?>
                @endforeach
              </tbody>
            </table>
            <table id="viewtbl">
              <tbody>
               <tr>
                  <td><strong>Total</strong></td>
                  <td><input type="text"  class="tot" name="tot" id="tot" value="<?php echo $total_amount; ?>"  style="width: 160px;"> </td>
              </tr>
              <!-- <tbody>
              <tr>
                  <td style="border:none;"><strong>Discount</strong></td>
                  <td style="border:none;"><input type="text" class="discount" name="discount" id="discount"   style="width: 160px;"></td>
            </tr>
           </tbody> -->
          <!-- <tbody>
              <tr>
                      <td style="border:none;"><strong>Sub Total</strong></td>
                      <td style="border:none;"><input type="text" class="subtotal" name="subtotal" id="subtotal"   style="width: 160px;"></td>
              </tr>
            </tbody> -->
                <tr>
                      <td style="border:none;"><strong style="font-size: 15px;">Pay Amount</strong></td>
                      <td style="border:none;"><input type="text" name="amount" id="amount" style="width: 160px;"></td>
                    </tr>
                  </tbody>
              <tbody >
                    <tr>
                      <td style="border:none;"><strong style="font-size: 15px;">Balance</strong></td>
                      <td style="border:none;"><input type="text" class="balance" name="balance" id="balance" style="width: 160px;"></td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr> 
                     <!--  <td style="border:none;"><input type="submit" value="Print  " class="btn btn-success" >
                      </td> -->
                      <td style="border:none;"><input type="submit" value="Save " class="btn btn-danger btn-sm"></td>
                      
                    </tr>
                  </tbody> 
            </table>
         


          </form>

                      </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
   <?php } ?>
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

     
       var student = $("#student").val();
      if(student){
      

         //ajax
         $.get('/json-class?stud='+student,function(data){
        console.log(data);
        $('#class_id').empty();
         $('#class_id').append('<option value="0" selected="true" disabled="true">Select Class </option>');

        $.each(data,function(index,brandObj){
         $('#class_id').append('<option value="'+brandObj.id+'">'+brandObj.first_name+' - '+brandObj.subject+'</option>');
        });
        });

       

      }

       });

  

$( document ).ready(function() {

      

    //    $('#student').on('change',function(e){
    //    console.log(e);
    //   var stud=e.target.value;

    //      //ajax
    //      $.get('/json-class?stud='+stud,function(data){
    //     console.log(data);
    //     $('#class_id').empty();
    //      $('#class_id').append('<option value="0" selected="true" disabled="true">Select Class </option>');

    //     $.each(data,function(index,brandObj){
    //      $('#class_id').append('<option value="'+brandObj.id+'">'+brandObj.first_name+' - '+brandObj.subject+'</option>');
    //     });
    //     });
    // });

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
 




   