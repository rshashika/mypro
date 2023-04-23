 <html>
 <head>
  <link href="//bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> <!--
<script src="//bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"> -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->


 <!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>



       </head>
       <body>         
               <!--  <address>
                    

                    <h4><strong>Tution Nmae</strong></h4>
                    <h4><strong>Adres</strong></h4>
                    <h4><strong><?php echo date("Y-m-d"); ?></strong></h4>
                    <h4><?php echo date("h:i:sa"); ?></h4>
                    </address> -->
                     <div class="container">
        <div >
          <br>
              <button onclick="history.back()" class="btn btn-primary font-weight-bolder"> Back</button>    

          <!-- <div class="card-header"> -->
            <h3 class="text-center">Filter Attendence</h3>
          <!-- </div> -->

   <form enctype="multipart/form-data" class="form-inline" method="post" action="{{ url('admin/view-teachattendence-report') }}" name="add_Place" id="add_Place" >  {{ csrf_field() }}
            
   
                 <!-- <div class="row">

                  

                 
                  <div class="col">
                    <label class="form-label">Select Date</label>
                  <input type="month" name="date" id="date" class="form-control" required>
                  </div>

                  <div class="col">
                    <input type="submit" id="tempadd" value="View " class="btn btn-success btn-sm">
                  </div>
                   
                 </div> -->
                  <div class="form-group">
                      <label> Select Teacher &nbsp;</label>
                   <select class="select2 form-control"  name="teacher" id="teacher"   >
                    <option value="" >Teacher  </option>
                  @foreach($teachers as $stu )
                    <option value="{{$stu->id}}"@if(!empty($teacher) && $stu->id==$teacher) selected @endif>{{$stu->id}}-{{ $stu->first_name." ".$stu->last_name}}</option>
                     @endforeach
                       
                     </select>

                    
                  &nbsp; <label class="form-label">Select Month &nbsp;</label>
                  <input type="month" name="date" id="date" class="form-control" value="@if(!empty($start)) {{$start }} @endif"> &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="submit" id="tempadd" value="Filter " class="btn btn-success btn-sm"> &nbsp;
                  <input type="button" onclick="location.href='{{ url('admin/view-teachattendence-report') }}';" id="tempadd" value="Reset " class="btn btn-danger btn-sm">
                   </form>
                   </div>

  
           

        </div> 
                </div>
               
                 <h3 class="panel-title"><center><strong>Attendence Details</strong></center></h3>
                 <center>
             <table border="1" class="table-bordered table-condensed">
                                 <thead>
                                  
                                    <tr>
                                       
                                     <th style="width:150px; ">Name</th>
                                    <!--  <th style="width:150px; ">Class</th> -->
                                       @foreach($tutiodys as $date)
                                         
                                         <th style="width:150px; ">{{ $date->tution_date }}</th>

                                         @endforeach
                                      <!--  <th class="text-right">Action</th> -->
                                       </tr>
                                 </thead>
                                 <tbody>
                                   
                                    @foreach($levels as $class)
                                 
                                    <tr>
                                       <td style="text-align: center;"> {{ $class->first_name. " " .$class->last_name }} </td>
                                         
                                         <?php $cate = explode(",",$class->attend_dates); 
                                             $count=count($cate);
                                             // $counts=$tutiodys->count('tution_date');

                                           ?>
                                        
                                        @foreach($tutiodys as $ds)
                                        
                                        
                                         
                                          <td style="text-align: center;">
                                          
                                            <?php
                                            $tutio= DB::table('tutiondays')
                                               ->select('tutiondays.*')
                                              // ->where('tution_code',$class->class)
                                               ->where('tution_date',$ds->tution_date)
                                               ->first();  
                                             // print_r($tutio) ?>
                                            <?php if ($tutio) {
                                              if ($tutio->status==4) { ?>
                                                <span style="color:red">Cancelled</span>
                                            <?php  }elseif($tutio->status==3){ ?>
                                                <span style="color:blue;">Holiday</span>
                                           <?php }elseif ($tutio->id==" ") {  ?>
                                              empty
                                            <?php } ?>
                                           <?php } ?>

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
                            </center>
                         
                        </body>
                        </html>

     
     <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
 

  })
  $(document).ready(function(){

   $('#student').on('change',function(e){
       console.log(e);
      var stud=e.target.value;

         //ajax
         $.get('/json-class?stud='+stud,function(data){
        console.log(data);
        $('#class_id').empty();
         $('#class_id').append('<option value="0" selected="true" disabled="true">Select Class </option>');

        $.each(data,function(index,brandObj){
         $('#class_id').append('<option value="'+brandObj.id+'">'+brandObj.first_name+' - '+brandObj.subject+'</option>');
        });
        });
    });

 });
  </script>