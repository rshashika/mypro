@extends('layouts.adminLayout.admin_design')
@section('content')
   
         
 <div class="content-wrapper">
   

       @if(Session::has('flash_message_error'))
          <div class="alert alert-error alert-danger">
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
            <h1>All Students </h1>
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
            <div class="card ">
              <div class="card-header">
                <div class="col-md-6 d-block">
        <a href="{{ url('/admin/add-student') }}" class="btn btn-sm btn-dark float-left"><i class="ik plus-square ik-plus-square"></i> Add New Student</a>
      </div>
              </div>
              <!-- /.card-header -->
               @if (Session::get('adminDetails')['branch']=="Admin") 
              <div class="card-body">
                
               {{--  <form enctype="multipart/form-data" class="form-inline" method="post" action="{{ url('admin/view-students') }}" name="add_Place" id="add_Place" >  {{ csrf_field() }}
              <div class="col-md-6">
                  <div class="form-group">
                      <label>  Branch &nbsp;</label>
                   <select class="select2 form-control"  name="branch" >
                     <option>Select Branch</option>
                      <option value="PL">Pilimathalawa</option>
                      <option value="DA">Danthure</option>
                      <option value="MA"> Mahakanda</option>
                      <option value="NL"> Nillaba</option>    
                     </select>
                   </div>
                 </div>
                 <div class="col-md-6">    
                  <div class="form-group">
                    <input type="reset" onclick="location.href='{{ url('admin/view-students') }}';" value="Reset " class="btn btn-danger btn-sm"> &nbsp; &nbsp;
                  <input type="submit"  value="Filter " class="btn btn-success btn-sm">
                  
                </div>
              </div>

                   </form> --}}


              </div>
              @endif
               <div class="card-body">
                <table id="exptbl" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th> Admission</th>
                                       <th>Student</th>
                                       <th>Contact</th>
                                       <th>Address</th>
                                       <th>Barcode</th>
                                      
                                       <th>Image</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                   <tbody>
                                 @foreach($classes as $class)
                               
                                    <tr>
                                       <td>{{ $class->admission_num }}</td>
                                       <td>{{ $class->first_name }}</td>
                                       <td>{{ $class->contact }} </td>
                                       <td>{{ $class->address }}</td>
                                       <td>  @if(!empty($class->Image))
                                        <img src="{{ asset('storage/barcodes/'.$class->Image) }}" style="width:50px;">
                                        @endif</td>
                                       
                                       <td class="center">
                                        @if(!empty($class->Image))
                                        <img src="{{ asset('/storage/students/small/'.$class->Image) }}" style="width:50px;">
                                        @endif
                                      </td>
                                       <td class="text-right">
                                          <div class="actions">
                                             <a href="{{ url('/admin/edit-student/'.$class->id) }}" class="btn btn-info btn-sm">
                                              <i class="fas fa-pencil-alt">
                                              </i> Edit
                                             <!-- <img src="https://img.icons8.com/color/20/000000/edit--v1.png"/> -->
                                             </a>
                                             <a href="{{ url('/admin/manage-student/'.$class->admission_num) }}" class="btn btn-sm bg-success-light mr-2">
                                             <img src="https://img.icons8.com/external-febrian-hidayat-gradient-febrian-hidayat/20/000000/external-manage-business-and-management-febrian-hidayat-gradient-febrian-hidayat.png"/>
                                             </a>
                                             <a  class="deleteRecord btn btn-danger btn-sm" rel="{{ $class->id }}" rel1="delete-student" href="javascript:" > <i class="fas fa-trash">
                                              </i> Delete</a>
                                             <!--  <a rel="{{ $class->id }}" rel1="delete-employee" href="javascript:" class="del cursure-pointer mr-2 deleteRecord" >
                                             <i class='ik ik-trash-2 text-danger'></i> -->
                                            <!--  <a class="btn btn-info btn-sm" href="#">
                                              <i class="fas fa-pencil-alt">
                                              </i>
                                              Edit
                                          </a>
                                          <a class="btn btn-danger btn-sm" href="#">
                                              <i class="fas fa-trash">
                                              </i>
                                              Delete
                                          </a> -->
                                            
                                          </div>
                                       </td>
                                    </tr>
                                   
                                
                                  @endforeach
                                   </tbody>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">


$(document).ready(function($) {

   // const Toast = Swal.mixin({
   //    toast: true,
   //    position: 'top-end',
   //    showConfirmButton: false,
   //    timer: 3000
   //  });
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


