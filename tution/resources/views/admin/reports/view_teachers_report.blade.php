 <link href="//bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> <!--
<script src="//bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />

         
       
          
                
                   <!--  <address>
                    

                    <h4><strong>Tution Nmae</strong></h4>
                    <h4><strong>Adres</strong></h4>
                    <h4><strong><?php echo date("Y-m-d"); ?></strong></h4>
                    <h4><?php echo date("h:i:sa"); ?></h4>
                    </address> -->
   
                
               
                 <h3 class="panel-title"><center><strong>Teacher's  Details</strong></center></h3>
                 <center>
             <table border="1">
                  <thead>
                    <tr>
                   <th style="width:20px; ">#</th>
                      <th style="width:150px; "> Name</th>
                      <th style="width: 110px;" > Birth</th>
                      <th style="width:200; ">Address</th>
                      <th style="width:100px; ">Contact</th>
                      <th style="width:100px; ">Email</th>
                       <th style="width:175; ">Classes  </th>
                      <th style="width:200px; ">Join  Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $i=1; //print_r($levels)  ?>
                    @foreach($teacherdata as $pro)
                                <tr>  
                                <td>{{ $i }}</td>                            
                             <td style="text-align: center; font-size: 17px;">{{ $pro->first_name }} {{ $pro->last_name }}</td>
                               <td style="text-align: center;">{{ $pro->dob }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $pro->address }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $pro->contact }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $pro->email }}</td>
                                   <td><?php 
                                  
                                   $teachers_class =DB::table('tutions')
                                     ->select('tutions.*')
                                    ->where('tutions.teacher',$pro->id)
                                  //  ->join('students', 'students.admission_num', '=', 'studentincls.student')
                                    //->join('tutions', 'tutions.id', '=', 'studentincls.class')
                                    ->get();
                                     ?>
                                     @foreach($teachers_class as $pro)
                                       {{ $pro->subject }} | 
                                     @endforeach
                                     </td> 
                                    <td style="text-align: center; font-size: 17px;">{{ date('Y-m-d', strtotime($pro->created_at)) }}</td>  
                                </tr>   
                                <?php $i++; ?>
                                @endforeach 
        
                  </tbody>
                </table>
                </center>
 