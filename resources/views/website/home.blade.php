@extends('website.layouts.website')
@section('pageTitle')
Home
@endsection

@section('css')

<link href="{{ asset('website/resources/lib/lightbox/dist/css/lightbox.min.css') }}" rel="stylesheet" />
<style>
  a{
    text-decoration:none;
    color: black;
  }
  .btnss button:hover a{
    color:white;
  }
  .grid-gallery {
    width: 100%;
    max-width: 900px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-auto-rows: 250px;
    grid-auto-flow: dense;
    grid-gap: 10px;
  }

  .grid-gallery .grid-item {
    position: relative;
    background-color: #efefef;
    overflow: hidden;
  }

  .grid-gallery .grid-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1)
  }

  .grid-gallery .grid-item:hover img {
    transform: scale(1.1);
  }

  .grid-gallery .grid-item a {
    cursor: zoom-in;
  }

  @media(max-width:768px) {
    .grid-gallery {
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      grid-auto-rows: 250px;
    }

    .grid-gallery .grid-item:nth-child(3n - 2) {
      grid-column: unset;
      grid-row: unset;
    }
  }
</style>


<link href="{{ asset('website/resources/css/edits.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- Start Navbar -->
<nav class="container navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-white-bg">
  <a class="navbar-brand logo" href="#"><img
      src="{{ asset('website/resources/dashboard/resource/img/logo.png') }}" /></a>
  <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="ml-auto navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownService" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Service
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownService">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Blog
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownBlog">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSignIn" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          @guest('web') Sign In @endguest
          @auth('web') {{ get_user_data()->name }} @endauth
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownSignIn">
          @guest('web')
          <a class="dropdown-item" href="{{ route('login') }}">Sign In</a>
          <a class="dropdown-item" href="{{ route('register') }}">Registration</a>
          @else
          @if(Route::currentRouteName() !== 'website.client.dashboard')
          <a class="dropdown-item" href="{{ route('website.client.dashboard') }}">Dashboard</a>
          @endif
          <a class="dropdown-item" href="#"
            onclick="event.preventDefault(); document.getElementById('user-log-out').submit();">Sign-Out</a>
          <form id="user-log-out" action="{{ route(get_guard_name().'.logout') }}" method="POST">
            @csrf
          </form>
          @endguest
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- End Navbar -->

<!-- Start Slider -->
<div class="row fsection">
  <div class="col-xs-12 col-sm-12 col-lg-7">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        @foreach($sliders as $key => $service)
        <li data-target="#carouselExampleControls" data-slide-to="{{ $key }}"
          class=class="@if($key == 0) active @endif"></li>
        @endforeach
      </ol>


      <div class="carousel-inner">
        @forelse ($sliders as $key => $slider)
        <div class="carousel-item @if($key == 0) active @endif">
          <img class="d-block w-100" src="{{ asset($slider->ImagePath()) }}" alt="{{ $slider?->name }}" />
        </div>

        @empty

        @endforelse
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-lg-5">
    <div class="fsectiontitle">
      <h1 class="text-center">{{ $home?->title }}</h1>
      <h2 class="text-center">{{ $home?->description }}</h2>
      <h3 class="text-center">
        Starting at
        <span style="color: red; font-size: 40px"> 25 ₡ </span> per photo
      </h3>
    </div>
    <div class="feat">
      <h5>
        <span style="font-weight: 800; color: red"> &#10003;</span>
        {{ ' ' . $home?->note1 }}
      </h5>
      <h5>
        <span style="font-weight: 800; color: red"> &#10003;</span>
        {{ ' ' . $home?->note2 }}
      </h5>
      <h5>
        <span style="font-weight: 800; color: red"> &#10003;</span>
        {{ ' ' . $home?->note3 }}
      </h5>
      <h5>
        <span style="font-weight: 800; color: red"> &#10003;</span>
        {{ ' ' . $home?->note4 }}
      </h5>
      <div class="btnss">
        @if($header_btn)
        @foreach ($header_btn as $btn)
        <button class="{{ $loop->index == 0 ? 'btnssss' : 'grow_skew_backward' }}" style="
                          @if ($loop->index == 0)
                              background-color: #e00000;
                          @endif
                          height: 46px;
                          font-size: 12px;
                          width: 157px;
                        ">
                        <a href="https://{{$btn?->url}}" target="_blank">
          {{ $btn?->name }}
                        </a>
        </button>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</div>


<!-- End Slider -->

<!-- Start Banner -->
@if ($home)
<br />
<div class="srowsection">

  @foreach ($home->homeBannerPath() as $image)
  <!--@if($loop->first)-->
  <!--@endif-->
  @if($loop->first)
  <img class="srowsectionn" src="{{ $image }}" alt="banner" />
  @endif
  @endforeach
</div>
<br />
@endif
<!-- End Banner -->

<!-- Start Icons Banner -->
@if ($icons)
<div class="trowsection">
  <div class="container">
    <div class="text-center row" style="background-color: #e9e9e9">
      @forelse ($icons as $key => $icon)
      <div
        class="@if($key == 0 || $key == 2) col-lg-3 @endif @if($key == 1 || $key == 3 || $key == 4) col-lg-2 @endif col-md-6 col-sm-6 col-xs-6 wow fadeInUp"
        data-wow-delay="0.1s">
        <div class="pt-3 rounded service-item">
          <div class="p-4">
            <i class="mb-4 fa fa-3x fa-user-tie text-primary"></i>
            <img src="{{ $icon->ImagePath() }}" alt="{{ $icon?->name }}" />
            <p>{{ $icon?->name }}</p>
          </div>
        </div>
      </div>
      @empty
      <div class="col-md-12">
        <div class="d-flex justify-content-center align-items-center">
          <p class="text-danger">add Some icon image from icons settings</p>
        </div>
      </div>
      @endforelse
    </div>
  </div>
</div>
@endif
<!-- End Icons Banner -->

<!-- Start swapping services Gallery -->
@if ($services)
<div class="mt-5 text-center">
  <h1>{{ $home?->service_title }} <span style="color: #e00000"> {{ $home?->service_title_colored }} </span></h1>
  <p class="lead">{{ $home?->service_gallery_description }}</p>
  <div class="container">
    <section id="content">
      <div class="clearfix content-wrap" style="padding: 0 0 10px 0 !important">

        <div class="block-expand-categories flex-column flex-lg-row d-flex justify-content-center">
          @forelse ($services as $service)
          <div class="expand-category bg-light" style="background-image: url({{ $service->ImagePath() }})">
            <a href="https://{{$service?->url}}"target="_blank"><h4 style="color: #1abc9c">{{ $service?->name }}</h4></a>
          </div>
          @empty
          <div class="col-md-12">
            <div class="d-flex justify-content-center align-items-center">
              <p class="text-danger">add Some Service from Service Dashboard Tab</p>
            </div>
          </div>
          @endforelse
        </div>

      </div>
    </section>
  </div>
</div>
@endif
<!-- End swapping services Gallery -->

<!-- Start About Section -->
<div class="row elsection">
  @if ($about)
  <div class="col-xs-12 col-sm-12 col-lg-8 col-xl-8 ele">
    <div class="col-xs-6 col-sm-6 col-lg-3 col-xl-3">
      <img src="{{ $about?->ImagePath() }}" width="150px" class="text-center" alt="{{ $about?->name }}" />
    </div>
    <div class="col-xs-6 col-sm-6 col-lg-8 col-xl-8 lol">
      <h5>{{ $about?->name }}</h5>
      <h5 style="color: #e00000">
        <span style="font-weight: 800">{{ $about?->note1 }}</span>
      </h5>
      <h5 style="font-size: 14px">
        {{ $about?->note2 }}
      </h5>
    </div>
  </div>
  <!-- Start Comments Slider -->
  @if ($comments)
  <div class="col-xs-12 col-sm-12 col-lg-4 col-xl-4">
    <div class="container mt-5">
      <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @forelse ($comments as $key => $comment)
          <div class="carousel-item @if($key == 0) active @endif hel">
            <h3 style="color: #e00000">
              {{ substr($comment->title, 0, 20) }} @if(strlen($comment->title) > 20) ... @endif
            </h3>
            <p>{{ $comment?->body }}</p>
            <p>{{ $comment?->email }}</p>
          </div>
          @empty
          <div class="carousel-item active hel">
            <p>No Comment Found.</p>
          </div>
          @endforelse
        </div>
        <ol class="carousel-indicators" style="margin-right: 0px; margin-bottom:-16px">
          @forelse ($comments as $key => $comment)
          <li data-target="#testimonialCarousel" data-slide-to="{{ $key }}" class="@if($key == 0) active @endif"></li>
          @empty
          @endforelse
        </ol>
      </div>
    </div>
  </div>
  @endif
  <!-- End Comments Slider -->
  @endif
  <!-- Start Before and After Slider -->
  @if ($slides)
  <div class="row fosection">
    <div class="col-xs-12 col-sm-12 col-lg-12 col-xl-12">
      <div class="container mt-5 mtt">
        <div class="row">
          <div class="col-lg-6">

            <div id="carouselExampleControlss" class="carousel slide" data-ride="carousel">

              <ol class="carousel-indicators">
                @foreach($slides as $key => $service)
                <li data-target="#carouselExampleControlss" data-slide-to="{{ $key }}"
                  class=class="@if($key == 0) active @endif"></li>
                @endforeach
              </ol>


              <div class="carousel-inner">
                @forelse ($slides as $key => $slide)
                <div class="carousel-item @if($key == 0) active @endif">
                  <img class="d-block w-100" src="{{ asset($slide->ImagePath()) }}" alt="{{ $slide?->name }}" />
                </div>

                @empty

                @endforelse
                <a class="carousel-control-prev" href="#carouselExampleControlss" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControlss" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>


            </div>

          </div>


          <div class="col-lg-6">
            <div class="text-center col-xs-12 col-sm-12 col-lg-12 col-xl-12">
              <div class="fosectiontitle">
                <h1 class="text-center">
                  <span class="text-center" style="background-color: #e00000; color: white">New</span>
                  {{ $slides?->last()?->name }}
                </h1>
                <p>
                  {{ $slides?->last()?->notes }}
                </p>
                <div class="btnss">
                  @if($services_btn)
                  @foreach ($services_btn as $btn)
                  <button class="{{ $loop->index == 0 ? 'btnssss' : 'grow_skew_backward' }}" style="
                                      @if ($loop->index == 0)
                                          background-color: #e00000;
                                      @endif
                                      height: 46px;
                                      font-size: 12px;
                                      width: 157px;
                                    ">
                    <a href="https://{{$btn?->url}}" target="_blank">
                      {{ $btn?->name }}
                    </a>
                  </button>
                  @endforeach
                  @endif
                </div>
              </div>
              <!-- Page content-->
            </div>
          </div>
        </div>
        <!-- End -->
      </div>
    </div>

  </div>
  <br />
  @endif
  <!-- End Before and After Slider -->

  <!-- Start Gallery Slider -->
  <div class="container mt-5 text-center">
    @if ($mediaGallery)
    @forelse($mediaGallery as $gallery)
    <h1> <span style="color: #e00000">{{$gallery->name}}</span></h1>
    <p class="lead">
      {{$gallery->note}}
    </p>
    <div class="grid-gallery">
      @foreach ($gallery->images as $image)
      <div class="grid-item">
        <a href="{{asset('dashboard/img/gallery/' . $image->photo)}}" data-lightbox="gridImage">
          <img src="{{asset('dashboard/img/gallery/' . $image->photo)}}" />
        </a>
      </div>
      @endforeach
    </div>
    @empty
    @endforelse
    @endif
  </div>
  <!-- End Gallery Slider -->
</div>
<!-- End About Section -->

<!-- Start Couple -->
<div class="mt-5 text-center">
  <h1> <span style="color: #e00000"> {{$couple?->name}} </span></h1>
  <p class="lead">
    {{$couple?->note}}
  </p>
</div>
<!-- End Couple -->

<!-- Start Features -->
@if ($partners)
<div class="containerr h-100">
  <div class="row align-items-center h-100">
    <div class="rounded containerr">
      <h1 class="text-center">{{$feature?->name}}</h1>
      <div class="slider">
        <div class="logos">
          @foreach ($partners as $partner)
          <i class="fab fa-js fa-4x"><img src="{{ $partner->ImagePath() }}" /></i>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endif
<br>
<!-- End Features -->
@if($feature)
<div class="more_info my-5">
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="col-lg-6">
          <p>
            {{$feature?->note1}}
          </p>
        </div>
        <div class="col-lg-6">
          <p>
            {{$feature?->note2}}
          </p>
        </div>

        <div class="col-12">
          <p>
            {{$feature?->note3}}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@endsection

@section('js')
<script src="{{ asset('website/resources/lib/lightbox/dist/js/lightbox.min.js') }}"></script>
<script>
  lightbox.option({
    resizeDuration: 200,
    wrapAround: true,
  });
</script>
@endsection