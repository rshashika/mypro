@extends('layouts.adminLayout.admin_design')
@section('content')

 <div class="content-wrapper">
 

  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">View Classes</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
          <!-- <div class="widget-content nopadding"> -->
            <table class="table ">
              <thead>
                <tr>
                  <th> Report</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              
                <tr class="gradeX">
                  <td class="center"><h5>Students</h5></td>
                  <td class="center"> 
                    <a  href="{{ url('/admin/view-students-report') }}" class="btn btn-warning btn-sm">View Report </a><br><br>
                   <!--  <a target="_blank" href="{{ url('/admin/view-pdf-product') }}" class="btn btn-primary btn-sm">View PDF Report</a>  -->
                  </td>
                </tr>
              
              </tbody>
               <tbody>
              
                <tr class="gradeX">
                  <td class="center"><h5>Teachers</h5></td>
                  <td class="center"> 
                    <a  href="{{ url('/admin/view-teachers-report') }}" class="btn btn-warning btn-sm">View Report</a><br><br>
                   <!--  <a target="_blank" href="{{url('/admin/view-pdf-users') }}" class="btn btn-primary btn-sm">View PDF Users</a> --> 
                  </td>
                </tr>
              
              </tbody>
               <tbody>
              
                <tr class="gradeX">
                  <td class="center"><h5>Attendence</h5></td>
                  <td class="center"> 
                    <a  href="{{ url('/admin/view-attendence-report')}}" class="btn btn-warning btn-sm">Studnets Attendence </a><br><br>
                    <a  href="{{ url('/admin/view-teachattendence-report')}}" class="btn btn-warning btn-sm">Techers Attendence </a>
                   <!--  <a target="_blank" href="{{url('/admin/view-reports-products-charts') }}" class="btn btn-primary btn-sm">View Orders by Product Chart</a> -->
                    
                    
                  </td>
                </tr>
              
              </tbody>
           
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
   </section>
 </div>

@endsection