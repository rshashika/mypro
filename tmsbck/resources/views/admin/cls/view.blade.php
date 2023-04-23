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
            <h1>View Classes</h1>
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
                                       <th>Class</th>
                                       <th>Time</th>
                                       <th>Grade</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                  <tbody>
                                 @foreach($classes as $class)
                                
                                    <tr>
                                      <td><?php $te=explode(",",$class->teacher);
                                        foreach ($te as $key ) {
                                          $tnm=DB::table('teachers')
                                               ->select('teachers.*')
                                        ->where('id',$key)
                                        ->first();

                                          echo $tnm->first_name.' '.$tnm->last_name."<br> ";
                                         } ?>
                                        
                                      </td>
                                       <td>{{ $class->subject }} </td>
                                       <td>{{ $class->time }}</td>
                                       <td>{{ $class->grade }}</td>
                                       <td class="text-right">
                                          <div class="actions">
                                             <a href="{{ url('/admin/edit-class/'.$class->id) }}" class="btn btn-info btn-sm">
                                               <i class="fas fa-pencil-alt">
                                              </i> Edit
                                             </a>
                                             <a  class="deleteRecord btn btn-danger btn-sm" rel="{{ $class->id }}" rel1="delete-class" href="javascript:" > <i class="fas fa-trash">
                                              </i> Delete</a>

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