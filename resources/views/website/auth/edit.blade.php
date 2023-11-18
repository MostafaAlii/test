@extends('website.layouts.dashboard')

@section('pageTitle')
    {{ get_user_data()->name . ' Dashboard' }}
@endsection

@section('css')

@endsection

@section('content')
    <div class="container-fluid dashboard-container">
        <div class="row">
            @include('website.layouts.common.client._sidebar')
            <!-- Start Dashboard -->
            <div class="col-12 col-sm-8 col-md-9">
                <!-- Start Dynamic Content -->
                <div class="dashboard-contents">
                    <div class="contents active" id="projects">
                        <h1>{{$data->name}}</h1>
                        <br>
                        <form action="{{route('website.ProfileEdit')}}" method="post" autocomplete="off">
                            @csrf

                            <input type="hidden" value="{{auth()->id()}}" name="id">

                            <div class="row">
                                <div class="col">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label>phone</label>
                                    <input type="number" class="form-control" name="phone" value="{{$data->phone}}">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                                </div>
                            </div>

                            <br>
                            
                            <div class="row">
                                <div class="col">
                                    <label>website</label>
                                    <input type="text" class="form-control" name="website" value="{{$data->website}}" required>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>Password confirm</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
                <!-- End Dynamic Content -->
            </div>
            <!-- End Dashboard -->
        </div>
    </div>
@endsection

@section('js')

@endsection
