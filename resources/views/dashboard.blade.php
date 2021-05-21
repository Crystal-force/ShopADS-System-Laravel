@extends('layouts.index')
@section('content')

          <!-- Loader -->
          <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

          <!-- Begin page -->
          <div id="wrapper">
  
              <div class="left side-menu">
                 @include('component.left-menu')
              </div>
  
              <!-- Start right Content here -->
  
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
                                      <h3 class="page-title">DASHBOARD</h3>
                                  </li>
                              </ul>
                              <div class="clearfix"></div>
                          </nav>
                      </div>
                      <!-- Top Bar End -->
  
                      <div class="page-content-wrapper ">
                          <div class="container">
                            <div class="row">
                                  <div class="col-md-6 col-lg-6 col-xl-3">
                                      <div class="mini-stat clearfix bg-primary">
                                          <span class="mini-stat-icon"><i class="mdi mdi-view-list"></i></span>
                                          <div class="mini-stat-info text-right text-white">
                                              <span class="counter">{{$ca_count}}</span>
                                              CATEGORIES
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-lg-6 col-xl-3">
                                      <div class="mini-stat clearfix bg-primary">
                                          <span class="mini-stat-icon"><i class="mdi mdi-folder-multiple-image"></i></span>
                                          <div class="mini-stat-info text-right text-white">
                                              <span class="counter">{{$img_count}}</span>
                                              IMAGES
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-lg-6 col-xl-3">
                                      <div class="mini-stat clearfix bg-primary">
                                          <span class="mini-stat-icon"><i class="mdi mdi-new-box"></i></span>
                                          <div class="mini-stat-info text-right text-white">
                                              <span class="counter">{{$news_count}}</span>
                                              NEWS
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-lg-6 col-xl-3">
                                      <div class="mini-stat clearfix bg-primary">
                                          <span class="mini-stat-icon"><i class="mdi mdi-account"></i></span>
                                          <div class="mini-stat-info text-right text-white">
                                              <span class="counter">{{$admin_count}}</span>
                                              Admin
                                          </div>
                                      </div>
                                  </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-6">
                                  <div class="card m-b-20">
                                      <div class="card-block">

                                          <h4 class="mt-0 header-title">CATEGORY LIST</h4>

                                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th>Category Name</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($category as $key=>$Category)
                                              @if($key == '5')
                                                @break
                                              @endif
                                                <tr>
                                                    <td>{{$Category->name}}</td>
                                                </tr>
                                              @endforeach
                                              </tbody>
                                          </table>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="card m-b-20">
                                      <div class="card-block">

                                          <h4 class="mt-0 header-title">IMAGE LIST</h4>

                                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th>Image</th>
                                                  <th>Category Name</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($image as $key => $Image)
                                                @if($key == "5")
                                                @break
                                                @endif
                                                  <tr>
                                                      <td><img class="rounded mr-2" alt="200x200" style="width: 200px;" src="{{$Image->image}}" data-holder-rendered="true"></td>
                                                      <td>{{$Image->categorylist->name}}</td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                          </table>
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
          <!-- END wrapper -->
 @endsection