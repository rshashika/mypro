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
   
                
               
                 <h3 class="panel-title"><center><strong>Student  Details</strong></center></h3>
                 <center>
             <table border="1">
                  <thead>
                    <tr>
                   <th >Admission Num</th>
                      <th style="width:150px; "> Name</th>
                      <th style="width: 110px;" > Birth</th>
                      <th style="width:200; ">Address</th>
                      <th style="width:100px; ">Contact</th>
                      <th style="width:100px; ">Grade</th>
                       <th style="width:175; ">Classes / Join Dates</th>
                      <th style="width:200px; ">Registered Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php //print_r($levels) ?>
                    @foreach($student_data as $pro)
                                <tr>
                                <td class="text-left">{{ $pro->admission_num }}</td>
                             <td style="text-align: center; font-size: 17px;">{{ $pro->first_name }} {{ $pro->last_name }}</td>
                               <td style="text-align: center;">{{ $pro->birth }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $pro->address }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $pro->contact }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $pro->grade }}</td>
                                   <td><?php 
                                  
                                   $students_class =DB::table('studentincls')
                                     ->select('studentincls.*','tutions.subject')
                                    ->where('studentincls.student',$pro->admission_num)
                                  //  ->join('students', 'students.admission_num', '=', 'studentincls.student')
                                    ->join('tutions', 'tutions.id', '=', 'studentincls.class')
                                    ->get();
                                     ?>
                                     @foreach($students_class as $pro)
                                       {{ $pro->subject }} -{{ $pro->join_date }}
                                     @endforeach
                                     </td> 
                                    <td style="text-align: center; font-size: 17px;">{{ $pro->created_at }}</td>  
                                </tr>   
                                @endforeach 
        
                  </tbody>
                </table>
                </center>
 