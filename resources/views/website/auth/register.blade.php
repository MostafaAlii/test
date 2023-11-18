@extends('website.layouts.common.web.login.login')
@section('css')

@endsection

@section('pageTitle')
    Client Register
@endsection

@section('content')
    <!-- Start Navbar -->
    

<!-- Start Navbar -->
    <div class="container-fluid">
         <nav class="container navbar navbar-expand-lg navbar-light bg-light navbar-white-bg">
            <a class="navbar-brand logo" href="#"><img src="{{ asset('website/resources/dashboard/resource/img/logo.png') }}" /></a>
            <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="ml-auto navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('website.home')}}">Home <span class="sr-only">(current)</span></a>
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
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('user-log-out').submit();">Sign-Out</a>
                                <form id="user-log-out" action="{{ route(get_guard_name().'.logout') }}" method="POST">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </li>
                    <!--<li class="nav-item my-btn">-->
                    <!--    <a class="nav-link order-now-link" href="{{route('website.orders.index')}}">Order Now</a>-->
                    <!--    <div class="my-btn-bg"></div>-->
                    <!--</li>-->
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    <!-- End Navbar -->

    <!-- Start Register Form -->
    <div class="container-fluid cont-top">
        <div class="row">
            <div class="col-12 col-lg-6 register-coloring">
                <div class="container">
                    <h2 class="h1">{{ $settings?->name }}</h2>
                    <h3 class="h2">{{ $settings?->notes }}</h3>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <form method="post" action="{{ route('register') }}" class="register-form" id="register">
                    @csrf
                    <h1 class="widget-title">Create An Account</h1>
                    <div class="form-group row">
                        <div class="col-12 col-sm-12">
                            <input id="name" type="text" class="form-control " name="name" value="" placeholder="Name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control " name="email" value="" placeholder="Email" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-sm-12">
                            <input id="website" type="text" class="form-control " name="website" value="" placeholder="Website" required>
                            @error('website')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-sm-6">
                            <input id="password" type="password" class="form-control " name="password" placeholder="Password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="form-check-input custom-control-input" id="terms_agree" type="checkbox" class="" name="terms_agree" required>
                            <label class="form-check-label custom-control-label" for="terms_agree">I agree to Photorelive.com <a href="#">terms of service</a></label>
                        </div>
                    </div>
                    {{--<div class="form-group captcha-form-group">
                        <label class='text-center w-100' for="capatcha">Write the numbers below</label>
                        <div class="mb-3 d-flex align-items-center justify-content-center">
                            <img src="https://photorelive.com/storage/captchas/fd9bb48e-6eed-497d-b9ec-05b8e8e90316.png"><div class="captcha">493</div>
                        </div>
                        <input id="capatcha" type="number" class="form-control" placeholder="Confirm Capatcha">
                    </div>--}} 

                    <div class="form-group">
                        <div class="mt-2 text-center col-12">
                            <button type="submit" class="form-btn">
                                <span>Signup</span>
                                <span class="btn-bg"></span>
                            </button>
                        </div>
                    </div>
                    <div class='or-phrase'>or</div>
                    <div class="form-group row login-link">
                        <a href="{{route('login')}}">Log in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Register Form -->
@endsection

@section('js')

@endsection