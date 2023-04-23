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
 
     
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
            <!--   <div class="card-header">
                <h3 class="card-title">View Classes</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">

                <table id="viewtbl" class="table table-bordered table-striped" >
                                 <thead>
                                  
                                    <tr>
                                       
                                     <th>Name</th>
                                     <th>Class</th>
                                       @foreach($tutiodys as $date)
                                         
                                         <th>{{ $date->tution_date }}</th>

                                         @endforeach
                                      <!--  <th class="text-right">Action</th> -->
                                       </tr>
                                 </thead>
                                 <tbody>
                                   
                                    @foreach($levels as $class)
                                 
                                    <tr>
                                       <td> {{ $class->first_name. " " .$class->last_name }} </td>
                                            <td>{{ $class->subject }}</td>
                                         <?php $cate = explode(",",$class->attend_dates); 
                                             $count=count($cate);
                                             // $counts=$tutiodys->count('tution_date');

                                           ?>
                                        
                                        @foreach($tutiodys as $ds)
                                        
                                        <td>
                                          @for ($i = 0; $i < $count; $i++)

                                          @if($ds->tution_date == $cate[$i])


                                            <!-- {{ $cate[$i] }}  -->
                                           
                                             &#10004;
                                       
                                          @endif 
                                         
                                       
                                           @endfor
                                           
                                            </td>  

                                                               
                                         @endforeach 
  
                                          
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