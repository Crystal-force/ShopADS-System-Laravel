@extends('layouts.index')
@section('content')

          <!-- Loader -->
          {{-- <div id="preloader"><div id="status"><div class="spinner"></div></div></div> --}}

          <!-- Begin page -->
          <div id="wrapper">
  
              <div class="left side-menu">
                 @include('component.left-menu')
              </div>
  
  
              <div class="content-page">
                  <!-- Start content -->
                  <div class="content">
  
                      <!-- Top Bar Start -->
                      <div class="topbar">
                          <nav class="navbar-custom">
                              <ul class="list-inline float-right mb-0">
                                  <li class="list-inline-item dropdown notification-list">
                                      <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                         aria-haspopup="false" aria-expanded="false">
                                          <img src="assets/images/users/avatar-1.png" alt="user" class="rounded-circle">
                                      </a>
                                     
                                  </li>

                                  <li class="list-inline-item dropdown notification-list">
                                      <a class="nav-link dropdown-toggle arrow-none waves-effect " data-toggle="dropdown" href="#" role="button"
                                        aria-haspopup="false" aria-expanded="false">
                                          <i class="mdi mdi-logout noti-icon logout-icon"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                          <a class="dropdown-item" href="/setting"><i class="mdi mdi-settings m-r-5 text-muted "></i> Settings</a>
                                          <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                      </div>
                                  </li>
                              </ul>
  
                              <ul class="list-inline menu-left mb-0">
                                  <li class="list-inline-item">
                                      <button type="button" class="button-menu-mobile open-left waves-effect mobile-menu">
                                          <i class="ion-navicon"></i>
                                      </button>
                                  </li>
                                  <li class="hide-phone list-inline-item app-search">
                                      <h3 class="page-title">SETTING</h3>
                                  </li>
                              </ul>
                              <div class="clearfix"></div>
                          </nav>
                      </div>
                      <!-- Top Bar End -->
  
                      <div class="page-content-wrapper ">
                          <div class="container">

                            <div class="row">
                              <div class="col-lg-12">
                                <a href="javascript:;" onclick="ResetInformation()">Reset Information</a>
                                <div class="card m-b-20" id="reset_info">
                                    <div class="card-block">
                                        <h4 class="mt-0 header-title">Admin Information</h4>
                                        
                                        <div class="reset-info">
                                          <div class="col-sm-6">
                                            <div class="alert alert-warning" role="alert" id="reset_info_fault">
                                                
                                            </div>
                                            <div class="alert alert-success" role="alert" id="reset_success_alert">
                    
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Name *</label>
                                                <input type="text" class="form-control" required placeholder="{{$user->name}}" id="reset_name" readonly/>
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="text" class="form-control" required placeholder="{{$user->email}}" value="{{$user->email}}" id="reset_email" readonly/>
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>New Password *</label>
                                                <input type="text" class="form-control" required placeholder="New password" id="new_password"/>
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div>
                                                <button type="button" class="btn btn-primary waves-effect waves-light info-btn" onclick="ResetInfomation()">
                                                    Reset
                                                </button>
                                                <button type="button" class="btn btn-secondary waves-effect m-l-5 info-btn" onclick="ResetInfoCancel()">
                                                    Cancel
                                                </button>
                                            </div>
                                          </div>
                                        </div>
                                       
                                    </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <a href="/logout">Logout</a>
                              </div>
                            </div>
                            
                          </div><!-- container -->
                      </div> <!-- Page content Wrapper -->
                 
                 
                  </div> <!-- content -->
  
                @include('component\footer')
              </div>
              <!-- End Right content here -->
  
          </div>
          <!-- END wrapper -->


 @endsection