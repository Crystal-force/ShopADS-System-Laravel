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
                                      <h3 class="page-title">CATEGORY MANAGEMENT</h3>
                                  </li>
                              </ul>
                              <div class="clearfix"></div>
                          </nav>
                      </div>
                      <!-- Top Bar End -->
  
                      <div class="page-content-wrapper ">
                          <div class="container">

                            <div class="row">
                             
                             
                            </div>

                            <div class="row">
                              <div class="col-12">
                                <div class="table-top">
                                    <h4>IMAGES</h4>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-form-label"><button type="button" class="btn btn-success waves-effect waves-light new-category-btn" data-toggle="modal" data-target="#myModal_Screen">+ Add Image</button></label>
                                    </div>
                                  </div>
                                <div class="card m-b-20">
                                  <div class="card-block">
                                    <table id="datatable" class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th class="table-title-category">Category</th>
                                          <th class="table-title-name">Image</th>
                                          <th class="table-title-name">Time</th>
                                          <th class="table-title-edit">Remove</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        @foreach($image as $Images)
                                        <tr>
                                          <td class="table-content">{{$Images->categorylist->name}}</td>
                                          <td class="table-content"><img class="rounded mr-2" alt="200x200" style="width: 100px;" src="{{$Images->image}}" data-holder-rendered="true"></td>
                                          <td class="table-content">{{$Images->time}}</td>
                                          <td class="table-content"><a href="javascript:;" onclick="RemoveImage(this)" data-toggle="modal" data-target="#myModal_Remove_Image" data-id={{$Images->id}}><i class="mdi mdi-delete delete-icon"></i></a></td>
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


          <!-- sample modal content -->
        <div id="myModal_Screen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add Images</h5>
                    </div>
                    <div class="news-alert">
                      <div class="alert alert-success" role="alert" id="screens_success_alert">
                      
                      </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="form-control" id="screen_category">
                                  @foreach($category as $Category)
                                    <option value={{$Category->id}}>{{$Category->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="form-control" id="screen_select">
                                    <option value="1">First Section</option>
                                    <option value="2">Second Section</option>
                                </select>
                            </div>
                        </div>
                        <div class="m-b-30">
                          <form class="dropzone needsclick m-auto dropzone-size" id="image_main" action='/screens_upload' method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <div class="dz-message needsclick">
                              <p style="font-size: 16px;">Drop image here or click to upload.</p>
                            </div>
                          </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="AddScreens()">Add News</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal --> 


        <!-- remove modal content -->
        <div id="myModal_Remove_Image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title mt-0" id="myModalLabel"><span class="remove-confirm-icon">!</span>Are you sure?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="news-alert">
                    <div class="alert alert-warning" role="alert" id="fault_screens_remove_alert">
                              
                    </div>
                    <div class="alert alert-success" role="alert" id="remove_screens_alert">
                    
                    </div>
                  </div>
                  <div class="modal-body">
                      <h6>Do you really remove this image now? Please check again!</h6>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary waves-effect waves-light" onclick="ConfirmScreens()">Remove Image</button>
                  </div>
              </div>
          </div>
        </div>

 @endsection