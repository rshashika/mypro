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
            <h1>Update Access</h1>
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
         <div class="card ">
          <!-- <div class="card-header">
            <h3 class="card-title">Admin / SubAdmin </h3>
          </div> -->

            <form class="form-horizontal" method="post" action="{{ url('admin/edit-admin/'.$adminDetails->id) }}" name="add_admin" id="add_admin" >{{ csrf_field() }}

              <div class="card-body">
          <div class="row">
            <div class="col-md-6">

              {{--  <div class="form-group">
                      <label> Branch</label>
                   <select class="select2 form-control"  name="branch" >
                      <option>Select Branch</option>
                      <option value="PL"@if($adminDetails->branch == "PL")selected @endif>Pilimathalawa</option>
                      <option value="DA"@if($adminDetails->branch == "DA")selected @endif>Danthure</option>
                      <option value="MA"@if($adminDetails->branch == "MA")selected @endif> Mahakanda</option>
                      <option value="NL"@if($adminDetails->branch == "NL")selected @endif> Nillaba</option>
                     </select>
                   </div> --}}

                    <div class="form-group">
                <label class="form-label">Enable</label>
                  <input type="checkbox" name="status" id="status" @if($adminDetails->status == "1") checked @endif value="1">
              </div>
              
               </div>
               <div class="col-md-6">
                    
              <div class="from-group">
                <label class="control-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" value="{{ $adminDetails->username}}" required>
              </div>
              <div class="form-group">
                <label class="control-label">Password</label>           
                  <input type="password" class="form-control" name="password" id="password" value="{{ $adminDetails->password_plane }}" required> <br>
                  <input type="checkbox"  onclick="myFunction()">Show Password           
              </div>

            </div>
              <!-- <div class="form-actions">
                <input type="submit" value="Edit " class="btn btn-success btn-sm">
              </div> -->  

              </div>
          </div>
          <div class="card-footer">
               <button type="submit" class="btn btn-primary btn-sm"><i class="ik save ik-save"></i>&nbsp;Submit</button>
                <button onclick="history.back()" class="btn btn-outline-dark btn-sm"><i class="ik arrow-left ik-arrow-left"></i> Go Back</button>
              </div>
            </form>
          </div>
        </div>
      </section>  
    </div>

@endsection
<script type="text/javascript">
  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>