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
              <div class="card-header">
                <h3 class="card-title">Payments </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="viewtbl" class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                      <th>Receipt</th>
                                       <th>Name</th>
                                       <th>Payment Date</th>
                                       <th>Total</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 @foreach($pays as $class)
                                 <tbody>
                                    <tr>
                                      <td>{{ $class->receipt_no}}</td>
                                       <td>{{ $class->first_name }}</td>
                                       <td>{{ $class->payment_date }} </td>
                                       <td>{{ $class->total }}</td>
                                     
                                       <td class="text-right">
                                          <div class="actions">
                                               <a href="{{ url('/admin/view-morepaym/'.$class->id) }}" class="btn btn-primary btn-sm">
                                                <img src="https://img.icons8.com/external-smashingstocks-circular-smashing-stocks/20/000000/external-receipt-shopping-and-e-commerce-smashingstocks-circular-smashing-stocks.png"/> View</a> 
                                            <!--  <a href="#" class="btn btn-sm bg-danger-light">
                                             <i class="fas fa-trash"></i>
                                             </a> -->
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
