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
                                      <h3 class="page-title">NEWS MANAGEMENT</h3>
                                  </li>
                              </ul>
                              <div class="clearfix"></div>
                          </nav>
                      </div>
                      <!-- Top Bar End -->
  
                      <div class="page-content-wrapper ">
                          <div class="container">
                            <div class="row">
                              <div class="col-12">
                                <div class="table-top">
                                  <h4>NEWS</h4>
                                  <div class="form-group row">
                                      <label for="example-text-input" class="col-form-label"><button type="button" class="btn btn-success waves-effect waves-light new-category-btn" data-toggle="modal" data-target="#myModal">+ Add News</button></label>
                                  </div>
                                </div>
                                <div class="card m-b-20">
                                  <div class="card-block">
                                    <table id="datatable" class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th class="table-title-category">Category</th>
                                          <th class="table-title-name">Content</th>
                                          <th class="table-title-edit">Remove/Edit</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        @foreach($news as $News)
                                        <tr>
                                          <td class="table-content">{{$News->categorylist->name}}</td>
                                          <td class="table-content">{{$News->content}}</td>
                                          <td class="table-content"><a href="javascript:;" onclick="RemoveNews(this)" data-id ="{{$News->id}}" data-toggle="modal" data-target="#myModal_Remove_News"><i class="mdi mdi-delete delete-icon"></i></a><a href="javascript:;" onclick="EditNews(this)" value="{{$News->content}}" data-id ="{{$News->id}}" data-toggle="modal" data-target="#myModal_Edit_News"><i class="mdi mdi-tooltip-edit edit-icon"></i></a></td>
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
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Add News</h5>
                    </div>
                    <div class="news-alert">
                      <div class="alert alert-danger" role="alert" id="fault_news_alert">
                                
                      </div>
                      <div class="alert alert-success" role="alert" id="add_news_alert">
                      
                      </div>
                    </div>
                   
                    <div class="modal-body">
                        <div class="form-group row">
                            
                            <div class="col-sm-12">
                                <select class="form-control" id="select_category">
                                  @foreach($category as $Category)
                                    <option value="{{$Category->id}}" >{{$Category->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <textarea required class="form-control" rows="8" id="news_content"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="AddNews()">Add News</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal --> 
        
        <!-- remove modal content -->
        <div id="myModal_Remove_News" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title mt-0" id="myModalLabel"><span class="remove-confirm-icon">!</span>Are you sure?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="news-alert">
                    <div class="alert alert-success" role="alert" id="remove_news_alert">
                    
                    </div>
                  </div>
                  <div class="modal-body">
                      <h6>Do you really remove this news now? Please check again!</h6>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary waves-effect waves-light" onclick="ConfirmNews()">Remove News</button>
                  </div>
              </div>
          </div>
        </div>

        <!-- edit modal content -->
        <div id="myModal_Edit_News" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title mt-0" id="myModalLabel">Change News</h5>
                  </div>
                  <div class="news-alert">
                    <div class="alert alert-warning" role="alert" id="fault_news_edit_alert">
                              
                    </div>
                    <div class="alert alert-success" role="alert" id="edit_news_alert">
                    
                    </div>
                  </div>
                 
                  <div class="modal-body">
                      <div class="form-group">
                          <div id="old_news_content">
                             
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary waves-effect waves-light" onclick="ConfirmEditNews()">Change News</button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

 @endsection