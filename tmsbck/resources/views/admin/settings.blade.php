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
         <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Class Information</h3>
          </div>

              <form class="form-horizontal" method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{ csrf_field() }}

                    <div class="card-body">
          <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                  <label class="control-label">Username</label> 
                    <input type="text" value="{{ $adminDetails->username }}" class="form-control" readonly="" />
                </div>
                <div class="form-group">
                  <label class="control-label">Current Password</label>
                    <input type="password" name="current_pwd" class="form-control" id="current_pwd" />
                    <span id="chkPwd"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">New Password</label>
                    <input type="password" class="form-control" name="new_pwd" id="new_pwd" />
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" />
                </div>

              </div>

                <div class="form-actions">
                  <input type="submit" value="Update Password" class="btn btn-success btn-sm">
                </div>

              
            </div>
          </div>
              </form>
            
         </div>
        </div>
      </section>
      </div>


@endsection