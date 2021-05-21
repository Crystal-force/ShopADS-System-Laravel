@extends('layouts.index')
@section('content')

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-block">
                  <div class="alert alert-warning" id="login_warning" role="alert">
                      <strong>Warning!</strong>&nbsp;The information didn't register!
                  </div>
                  <div class="alert alert-success" role="alert" id="login_success_alert">
                    
                  </div>
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><span>Admin Panel</span></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Login</b></h4>

                    <div class="p-3">
                        <div class="form-horizontal m-t-20" >

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" id="lg_name" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" id="lg_password" required="" placeholder="Password">
                                </div>
                            </div>


                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" onclick="AdminLogin()">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    {{-- <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password?</a> --}}
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="/admin-register" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>

 @endsection