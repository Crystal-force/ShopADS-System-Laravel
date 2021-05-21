@extends('layouts.index')
@section('content')
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-block">
          <div class="alert alert-warning" id="register_warning" role="alert">
              <strong>Warning!</strong>Please insert your information correctly!
          </div>
          <div class="alert alert-warning" id="registered_user" role="alert">
              <strong>Warning!</strong>The user already registered!
          </div>
          <div class="alert alert-success" role="alert" id="register_success_alert">
                    
          </div>
            <h3 class="text-center mt-0 m-b-15">
                <a href="index.html" class="logo logo-admin"><span>Admin Panel</span></a>
            </h3>

            <h4 class="text-muted text-center font-18"><b>Register</b></h4>

            <div class="p-3">
                <div class="form-horizontal m-t-20" id="new_reigster">
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="name" name="name" id="admin_name" required="" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="email" email="email" id="admin_email" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="password" password="password" id="admin_password" required="" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block waves-effect waves-light" onclick="AdminRegister()">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20 text-center">
                            <a href="/login" class="text-muted">Already have account?</a>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

 @endsection