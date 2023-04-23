 <link href="//bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> <!--
<script src="//bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />

         
       
          
                
                    <address>
                    

                    <h4><strong>Isanka Fashion</strong></h4>
                    <h4><strong>Gampola</strong></h4>
                    <h4><strong><?php echo date("Y-m-d"); ?></strong></h4>
                    <h4><?php echo date("h:i:sa"); ?></h4>
                    </address>
   
                
               
                 <h3 class="panel-title"><center><strong>User Details</strong></center></h3>
                 <center>
             <table border="1">
                  <thead>
                    <tr>
                   <!--<th class="head0">Product ID</th>-->
                      <th style="width:150px; font-size: 19px;">User Name</th>
                      <th style="width:200px; font-size: 19px;">Address</th>
                      <th style="width:100px; font-size: 19px;">City</th>
                      <th style="width:100px; font-size: 19px;">Postal Code</th>
                      <th style="width:100px; font-size: 19px;">Contact No</th>
                      <th style="width:200px; font-size: 19px;">Email</th>
                      <th style="width:200px; font-size: 19px;">Status</th>
                      <th style="width:200px; font-size: 19px;">Created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Users_data as $user)
                                <tr>
                           
                             <td style="text-align: center; font-size: 17px;">{{ $user->name }}</td>
                           
                                    <td style="text-align: center; font-size: 17px;">{{ $user->address }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $user->city }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $user->postal_code }}</td>
                                    <td style="text-align: center; font-size: 17px;">{{ $user->mobile }}</td> 
                                    <td style="text-align: center; font-size: 17px;">{{ $user->email }}</td>
                                    <td style="text-align: center; font-size: 17px;">
                                      @if($user->status==1)
                                        <span style="color:green">Active</span>
                                      @else
                                        <span style="color:red">Inactive</span>
                                      @endif
                                    </td> 
                                    <td style="text-align: center; font-size: 17px;">{{ $user->created_at }}</td>  
                                </tr>   
                                @endforeach 
        
                  </tbody>
                </table>
                </center>
 