@extends('layouts.index')
@section('content')
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="main">
        <div class="container fill pageformat">
          <div class="row" style="background:url('{{$img_one['1']->image}}') no-repeat center/cover; height:12vh">
              <div class="col-lg-12 logo-top">
                <div class="text-center logo-parts" >
                    {{-- <h1 style="color:white">{{$company->name}}</h1> --}}
                </div>
              </div>
          </div>
          <div class="row page-space" style="margin-bottom:2px;margin-top:2px">
              <div class="col-lg-12">
                <marquee behavior="scroll" direction="left" class="news-scroll">{{$news->content}}</marquee>
              </div>
          </div>
          <div class="row page-space" style="margin-top:0px">
            <div class="col-lg-12" style="padding-left:0px; padding-right:0px">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="{{$img_time_1->time}}">
                  <div class="carousel-inner" role="listbox" >
                    <div class="carousel-item active slide-img-size" >
                        <img class="d-block img-fluid slide-img" src="{{$img_one['2']->image}}" alt="First slide">
                    </div>
                    @foreach($img_one as  $key=>$Image)
                      @if (!$loop->first)
                        <div class="carousel-item slide-img-size" >
                            <img class="d-block img-fluid slide-img" src="{{$Image->image}}" alt="First slide">
                        </div>
                      @endif                   
                    @endforeach
                  </div>
              </div>
            </div>
          </div>
          <div class="row page-space">
            <div class="col-lg-12">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="{{$img_time_2->time}}">
                  <div class="carousel-inner" role="listbox" >
                      <div class="carousel-item active slide-img-size">
                          <img class="d-block img-fluid slide-img" src="{{$img_two['0']->image}}" alt="First slide">
                      </div>
                      @foreach($img_two as $Image_Two)
                        @if(!$loop->first) 
                        <div class="carousel-item slide-img-size" >
                            <img class="d-block img-fluid slide-img" src="{{$Image_Two->image}}" alt="First slide">
                        </div>
                        @endif
                      @endforeach
                  </div>
              </div>
            </div>
          </div>
          <div class="row page-space" style="margin-bottom:20px">
            <div class="col-lg-12">
              <marquee behavior="scroll" direction="left" class="news-scroll">{{$news->content}}</marquee>
            </div>
         </div>
         <div class="row" style="background:url('{{$img_two['0']->image}}') no-repeat center/cover; height:12vh">
          <div class="col-lg-12 logo-top">
            <div class="text-center logo-parts" >
                {{-- <h1 style="color:white">{{$company->name}}</h1> --}}
            </div>
          </div>
      </div>
       </div>
</div>

<script type="text/javascript">
  setInterval(function()
    { 
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          type:"get",
          url:"/test-statu",
          datatype:false,
          success:function(data)
          {
            if(data.data == "1") {
                location.reload();
              }
            else if(data.data == "0") {
              return;
            }
          }
        });
    }, 5000);
</script>
<!-- END wrapper -->
@endsection

