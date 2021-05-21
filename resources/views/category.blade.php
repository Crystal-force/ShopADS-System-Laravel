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
                                      <h3 class="page-title">COMPANY MANAGEMENT</h3>
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
                                    <div class="col-lg-6">
                                      <div class="alert alert-warning" role="alert" id="company_fault">
                                          <strong>Warning!</strong> This company exist now. please check again!
                                      </div>
                                      <div class="alert alert-warning" role="alert" id="company_null">
                                          <strong>Warning!</strong> Please insert the company name correctly!
                                      </div>
                                      <div class="alert alert-success" role="alert" id="add_category_alert">
                    
                                      </div>
                                      <h4 class="mt-0 header-title">Add new company</h4>
                                      <div class="form-group row">
                                          <div class="col-sm-10 new-category-input">
                                              <input class="form-control" type="text" placeholder="Please insert new company name" id="category-text-input">
                                          </div>
                                          <label for="example-text-input" class="col-sm-2 col-form-label"><button type="button" class="btn btn-success waves-effect waves-light new-category-btn" onclick="AddCategory()">+ ADD</button></label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12">
                                <div>
                                  <h4>Company</h4>
                                </div>
                                <div class="card m-b-20">
                                  <div class="card-block">
                                    <table id="datatable" class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th class="table-title-name">Name</th>
                                          <th class="table-title-edit">Remove/Edit</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($category as $Category)
                                        <tr>
                                          <td class="table-content">{{$Category->name}}</td>
                                          <td class="table-content"><a href="javascript:;" onclick="RemoveCategory(this)" data-id = "{{$Category->id}}" data-toggle="modal" data-target="#myModal_Remove_Category"><i class="mdi mdi-delete delete-icon"></i></a><a href="javascript:;" onclick="EditCategory(this)" value="{{$Category->name}}" data-id="{{$Category->id}}" data-toggle="modal" data-target="#myModal_Edit_Category"><i class="mdi mdi-tooltip-edit edit-icon"></i></a></td>
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

          <!-- remove modal content -->
          <div id="myModal_Remove_Category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel"><span class="remove-confirm-icon">!</span>Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="news-alert">
                      <div class="alert alert-success" role="alert" id="remove_category_alert">
                      
                      </div>
                    </div>
                    <div class="modal-body">
                        <h6>Do you really remove this category now? Please check again!</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="ConfirmRemoveCategory()">Remove Category</button>
                    </div>
                </div>
            </div>
          </div>

          <!-- Edit modal content -->
          <div id="myModal_Edit_Category" class="modal fade edit-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel"><span class="remove-confirm-icon">!</span>Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="news-alert">
                      <div class="alert alert-info" role="alert" id="category_edit_fault">
                          
                      </div>
                      <div class="alert alert-success" role="alert" id="category_edit_success_alert">
                    
                      </div>
                    </div>
                    <div class="modal-body">
                        <h6>Do you really edit this category now? Please check again!</h6>
                        <div class="form-group row">
                            <div class="col-sm-12 new-category-input" id="edit_category">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="ConfirmEditCategory()">Save Category</button>
                    </div>
                </div>
            </div>
          </div>

 @endsection