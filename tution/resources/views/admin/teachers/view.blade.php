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
            <h1>View Teachers </h1>
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
              
              <!-- /.card-header -->
              <div class="card-body">

                <table id="viewtbl" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Contact</th>
                                       <th>Address</th>
                                       <th>DOB</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($classes as $class)
                                 <tbody>
                                    <tr>
                                       <td>{{ $class->first_name }}</td>
                                       <td>{{ $class->contact }} </td>
                                       <td>{{ $class->address }}</td>
                                       <td>{{ $class->dob }}</td>
                                       <td class="text-right">
                                          <div class="actions">
                                             <a href="{{ url('/admin/edit-teacher/'.$class->id) }}" class="btn btn-info btn-sm">
                                              <i class="fas fa-pencil-alt">
                                              </i> Edit  </a>
                                             <!-- <a href="#" class="btn btn-sm bg-danger-light">
                                             <img src="https://img.icons8.com/color-glass/20/000000/filled-trash.png"/> 
                                             </a> -->
                                             <a  class="deleteRecord btn btn-danger btn-sm" rel="{{ $class->id }}" rel1="delete-teacher" href="javascript:" > <i class="fas fa-trash">
                                              </i> Delete</a>
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
       
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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