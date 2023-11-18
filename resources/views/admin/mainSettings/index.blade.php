@extends('admin.admin_master')

@section('pageTitle')
{{ ucfirst($title) }}
@endsection

@section('css')
    <style>
        .dataTables_length{margin-left: 20px !important; padding: 10px !important;}
    </style>
@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="mb-2 content-header-left col-md-6 col-12">
        <h3 class="content-header-title">
            <i class="material-icons">settings</i>
            {{ ucfirst($title) }}
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.mainSettings') }}">{{ ucfirst($title) }}</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="content-wrapper">
    <div class="content-body">
        <div id="page-account-settings">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @include('admin.messages')
                                <form class="form form-horizontal" action="{{ route('admin.mainSettings.save') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <!-- Start General Information -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">settings</i>
                                            General Information :
                                        </h4>
                                        <div class="row">
                                            <!-- Start Name -->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="name">Name</label>
                                                        <input class="form-control border-primary" placeholder="Type Name" type="text" class="form-control" name="name" id="name" value="{{$setting->name}}">
                                                    </div>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="phone">Phone</label>
                                                        <input class="form-control border-primary" placeholder="Type Phone Number" type="text" class="form-control" name="phone" id="phone" value="{{$setting->phone}}">
                                                    </div>
                                                    @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-6" for="phone">Whatsapp Number</label>
                                                        <input class="form-control border-primary" placeholder="Type Whatsapp Number" type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{$setting->whatsapp}}">
                                                    </div>
                                                    @error('whatsapp')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-6" for="email">Email</label>
                                                        <input class="form-control border-primary" placeholder="Type Email" type="text" class="form-control" name="email" id="email" value="{{$setting->email}}">
                                                    </div>
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-6" for="logo">Logo</label>
                                                        <input class="form-control border-primary" type="file" class="form-control" accept="image/*" onchange="previewImage(this);" name="image" id="image">
                                                        <img class="rounded" id="image-preview" width="80px" height="80px" src="{{ $setting->ImagePath() }}" />
                                                    </div>
                                                    @error('image')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Name -->
                                        </div>
                                        <!-- Start Social Links -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">settings</i>
                                            Social Links :
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="p-1 col-md-3 btn btn-social btn-min-width btn-facebook" for="facebook"><i class="la la-facebook"></i></label>
                                                        <input class="form-control border-primary" placeholder="Type Facebook link" type="url" class="form-control" name="facebook" id="facebook" value="{{$setting->facebook}}">
                                                    </div>
                                                    @error('facebook')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="p-1 col-md-3 btn btn-social btn-min-width btn-twitter" for="twitter"><i class="la la-twitter"></i></label>
                                                        <input class="form-control border-primary" placeholder="Type Twitter link" type="url" class="form-control" name="twitter" id="twitter" value="{{$setting->twitter}}">
                                                    </div>
                                                    @error('twitter')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="p-1 col-md-3 btn btn-social btn-min-width btn-instagram" for="instagram"><i class="la la-instagram"></i></label>
                                                        <input class="form-control border-primary" placeholder="Type Twitter link" type="url" class="form-control" name="instagram" id="instagram" value="{{$setting->instagram}}">
                                                    </div>
                                                    @error('instagram')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Social Links -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">note</i>
                                            Notes :
                                        </h4>
                                        <div class="row">
                                            <div class="mb-2 form-group col-12">
                                                <label for="notes">Description</label>
                                                <textarea id="notes" rows="5" class="form-control" name="notes" placeholder="About Site">{{ $setting->notes }}</textarea>
                                            </div>
                                        </div>
                                        <!-- End General Information -->
                                    </div>
                                    <div class="text-center form-actions">
                                        <button type="button" class="mr-1 btn btn-danger">
                                            <i class="ft-x"></i>
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i>
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
