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
            <h1>All Access </h1>
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
            <!--   <div class="card-header">
                <h3 class="card-title">View Admin/ SubAdmin</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">

            <table id="viewtbl" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="text-align: left">ID</th>
                  <th style="text-align: left">Username</th>
                  <th style="text-align: left">Type</th>
                 
                  <th style="text-align: left">Status</th>
           <!--        <th style="text-align: left">Created on</th>
                  <th style="text-align: left">Updated on</th> -->
                  <th style="text-align: left">Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($admins as $admin)
                               <tr class="gradeX">
                  <td class="center">{{ $admin->id }}</td>
                  <td class="center">{{ $admin->username }}</td>
                  <td class="center">{{ $admin->type }}</td>
                 
                  <td class="center">
                    @if($admin->status==1)
                      <span style="color:green">Active</span>
                    @else
                      <span style="color:red">Inactive</span>
                    @endif
                  </td>
                <!--   <td class="center">{{ $admin->created_at }}</td>
                  <td class="center">{{ $admin->updated_at }}</td> -->
                  <td class="center">
                    <a href="{{ url('/admin/edit-admin/'.$admin->id) }}" class="btn btn-info btn-sm" ><i class="fas fa-pencil-alt">
                    </i> Edit </a>
                    <!-- <img src="https://img.icons8.com/color/20/000000/edit--v1.png"/> -->
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