@extends('auth.admin.login')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('pageTitle')
    Admin Login
@endsection
@section('content')
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{  $settings?->ImagePath()  }}" width="45px" height="45px" alt="{{ $settings?->name }}"></div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with
                                {{ $settings?->name }}</span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @include('admin.includes._partials.messages')
                            <form class="form-horizontal" novalidate method="POST" autocomplete="off"
                                action="{{ route('admin.login.post') }}">
                                @csrf
                                <fieldset class="form-group position-relative has-icon-left">

                                    <input class="form-control" placeholder="Email" name="email" required autofocus>
                                    <div class="form-control-position">
                                        <i class="la la-user"></i>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input class="form-control" id="user-password" placeholder="Password" type="password"
                                        name="password" required autocomplete="current-password">
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                        <fieldset>
                                            <input type="checkbox" id="remember-me" class="chk-remember" name="remember">
                                            <label for="remember-me"> Remember Me</label>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right">
                                        <a href="{{-- route('admin.password.request') --}}" class="card-link">Forgot Password</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i>
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
<!-- END: Content-->
