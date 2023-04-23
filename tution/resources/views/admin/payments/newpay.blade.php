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
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payments </h1>
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
         
             
             <form enctype="multipart/form-data" class="form-horizontal" method="post" action="#" name="add_Place" id="add_Place" >  {{ csrf_field() }}
                  
          <div class="card-body">
          <div class="row">


                <div class="col-md-6">

                  <div class="form-group">
                      <label> Select Payment Type</label>
                   <select class="select2 form-control"  name="type" id="type"  required >
                    <option value=" " selected="true" disabled="true"  ><h6>Payment Type  </h6></option>
                   @foreach($paycats as $key => $value)
                    <option value="{{$value->id}}">{{$value->title}}</option>
                     @endforeach
                       
                     </select>
                   </div>
                   <!-- <div class="form-group">
                <label class="form-label">Select Month</label>
                  <input type="month" name="month" id="month" class="form-control" required>
                  </div> -->

                </div>
                <div class="col-md-6">
                  
                </div>
 
                 <!--  <div class="form-group">
                    <label>Fees</label> -->
                     <input type="hidden" class="form-control amount" name="amount" id="amount">
                     <input type="hidden" name="student" id="student" value="{{$student->admission_num}}">
                  <!-- </div> -->

              <div class="form-actions">
                <button type="submit" id="tempadd" class="btn btn-success btn-sm"><i class="ik save ik-save"></i> Save </button>
                 <button onclick="history.back()" class="btn btn-outline-dark btn-sm"><i class="ik arrow-left ik-arrow-left"></i> Go Back</button>
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
            <h3 class="card-title">View Student Fees</h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form class="form-horizontal" method="post" action="{{ url('/admin/add-billpay') }}" name="add_bill" id="add_bill"> 
            {{ csrf_field() }}
                <table id="viewtbl" class="table table-bordered table-striped">
                  <thead>
                <tr>
                 <!--  <th>Product Name</th>  -->
                  <th>Student </th>
                  <!-- <th>Price </th> -->
                  <th>Type</th>
                  <th>Total</th>
                 <th>Action</th> 
                </tr>
              </thead> 
              <tbody>

                <?php $total_amount = 0; ?>
                @foreach($billtemptble as $bill)
                <tr class="gradeX">
                 <!--  <td><input type="text" name="product_name"  value="{{$bill->id}}"readonly></td></td> -->
                  <td><input type="text" name="sku"  value="{{$bill->student_id}}"readonly></td>
               <!--  </td> -->
                 <!--  <td><input type="text" name="price"  value="{{$bill->amount}}"readonly></td> -->
                  <td>
                      <input type="text" name="sku"  value="{{ $bill->title }}" readonly>
                    <input type="hidden" name="student"  value="{{$bill->student_id}}"readonly>
                  </td> 
                  <td>
                  <input type="text" name="total" class="total" id="total"  value="{{ $bill->amount}}"readonly>
                  </td>
                    <?php //$tot=($bill->id * $bill->id); ?>
                 <td class="center"><!-- <a  href="{{ url('/admin/delete-feestemp/'.$bill->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure Delete  ?')"> -->
                  <a class="deleteRecord btn btn-danger btn-sm" rel="{{ $bill->id }}" rel1="delete-feestemp" href="javascript:">
                  <i class="fas fa-trash"></i> Delete</a></td> 
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
                      <td style="border:none;"><input type="text" name="amount" id="amounts" style="width: 160px;"></td>
                    </tr>
                  </tbody>
              <tbody >
                    <tr>
                      <td style="border:none;"><strong style="font-size: 15px;">Balance</strong></td>
                      <td style="border:none;"><input type="text" class="balance" name="balance" id="balances" style="width: 160px;"></td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr> 
                     <!--  <td style="border:none;"><input type="submit" value="Print  " class="btn btn-success" >
                      </td> -->
                      <!-- <td style="border:none;"><input type="submit" value="Save " class="btn btn-danger btn-sm"></td> -->
                      
                    </tr>
                  </tbody> 
            </table>
        
                      </div>

                       <div class="card-footer text-md-right" >
                <button type="submit" class="btn btn-info btn-sm"><i class="ik save ik-save"></i> Save </button>
                 <button onclick="history.back()" class="btn btn-outline-dark btn-sm"><i class="ik arrow-left ik-arrow-left"></i> Go Back</button>
              </div>
                </form>  
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

    $('#amounts').keyup(function(){
             //  var tr=$(this).parent().parent();
            
             // var discount=tr.find('.discount').val();
              //tr.find('.tt').val(subtot);
             // tr.find('.amount').val(subtotal);
             //  alert("h");
               var tot = $('#tot').val();
                var pay = $('#amounts').val();

              var bal= pay-tot;
              $('#balances').val(bal);
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
    var amount = $("#amount").val();
    var clas = $("#class_id").val();
    var student = $("#student").val();
    var type=$('#type').val();

    //if (fees||clas||student||month) {}
    //alert(current_pwd);
    $.ajax({
    //  type:'get',
      url:'/add-tempreg',
      data:{
       "_token": "{{ csrf_token() }}",
      amount:amount,type:type,student:student},
      headers: {
                "cache-control": "no-cache"
            },
            // data: {
            //     coupon_code: coupon_code
            // },
            type: 'post',
            dataType: 'json',
      success:function(resp){
        // location.reload();

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
   
@endsection
 




   