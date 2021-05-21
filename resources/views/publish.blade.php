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
                                      <h3 class="page-title">PUBLISH</h3>
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
                                <div class="card m-b-20">
                                  <div class="card-block new-category">
                                    <div class="col-lg-8">
                                      <div class="news-alert">
                                        <div class="alert alert-success" role="alert" id="publish_success_alert">
                                        
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                          <div class="col-sm-6 new-category-input">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select class="form-control" id="publish_category" onchange="PublishImage()">
                                                      @foreach($category as $Category)
                                                        <option value="{{$Category->id}}">{{$Category->name}}</option>
                                                      @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-2 new-category-input">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select class="form-control" id="first_slide_speed">
                                                        <option value="1000">Normal</option>
                                                        <option value="3000">3 Second</option>
                                                        <option value="5000">5 Second</option>
                                                        <option value="10000">10 Second </option>
                                                    </select>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-2 new-category-input">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <select class="form-control" id="second_slide_speed">
                                                        <option value="1000">Normal</option>
                                                        <option value="3000">3 Second</option>
                                                        <option value="5000">5 Second</option>
                                                        <option value="10000">10 Second </option>
                                                    </select>
                                                </div>
                                            </div>
                                          </div>
                                          <label for="example-text-input" class="col-sm-2 col-form-label"><button type="button" class="btn btn-primary waves-effect waves-light new-category-btn" onclick="PublishProject()">Publish</button></label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="card m-b-20 card-width">
                                  <div class="card-block">
                                      <div id="category_no_img">
                                        <div class="no-image">
                                          <h4 class="mt-0 header-title">We can't find the images!</h4>
                                        </div>
                                      </div>
                                      <div>
                                        <div class="popup-gallery" id="category_images">
                                          
                                        </div>
                                      </div>
                                      
                                  </div>
                              </div>
                            </div>
                          </div><!-- container -->
                      </div> <!-- Page content Wrapper -->
                  </div> <!-- content -->
                @include('component\footer')
              </div>
              <!-- End Right content here -->
          </div>

 @endsection