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
            <h1>View Classes </h1>
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
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
             <!--  <div class="card-header">
                <h3 class="card-title">View Classes</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">

                <table id="viewtbl" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>Teacher</th>
                                       <!-- <th>Subject</th> -->
                                       <th>Time</th>
                                       <!-- <th>Grade</th> -->
                                       <th>Status</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($classes as $class)
                                 <tbody>
                                    <tr>
                                       <td>{{ $class->first_name }} {{ $class->last_name }}</td>
                                       <!-- <td>{{ $class->subject }} </td> -->
                                       <td>{{ $class->time }}</td>
                                       <!-- <td>{{ $class->grade }}</td> -->
                                       <td><select name="status" id="status" onchange="change_status({{$class->newid}},this.value);">
                                         <option value="1"@if(!empty($class->status) && $class->status==1) selected @endif>Present</option>
                                          <option value="3"@if(!empty($class->status) && $class->status==3) selected @endif>Holiday</option>
                                          <option value="4"@if(!empty($class->status) && $class->status==4) selected @endif>Cancelled</option>

                                       </select>
                                       </td>
                                       <td class="text-right">
                                          <div class="actions">
                                    @if($class->status==1) 
                                              <a href="{{ url('/admin/mark-attendence/'.$class->id) }}" class="btn btn-info btn-sm">
                                              <i class="ik ik-pie-chart save">
                                              </i> Mark  </a>
                                            @endif 
                                          </div>
                                       </td>
                                    </tr>
                                   
                                 </tbody>
                                  @endforeach
                              </table>
                          

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
    <!-- /.content -->
    
  </div>
      <script type="text/javascript">
    function change_status(id,status){
     // var id=1;
        // alert(id);
        $.ajax({
    //  type:'get',
      url:'/change-cls-status',
      data:{
       "_token": "{{ csrf_token() }}",
      id:id,status:status},
      headers: {
                "cache-control": "no-cache"
            },
            // data: {
            //     coupon_code: coupon_code
            // },
            type: 'post',
            dataType: 'json',
      success:function(data) {
            if (data==1) {
                Swal.fire({
                  // position: 'top-end',
                  icon: 'success',
                  title: 'Class Status changed',
                  showConfirmButton: false,
                  timer: 1500
                })
                window.location.reload();
            }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                  // footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        }
    });
      }

       
</script> 
@endsection
