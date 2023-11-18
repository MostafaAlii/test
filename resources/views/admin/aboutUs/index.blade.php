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
                    <li class="breadcrumb-item"><a href="{{ route('admin.aboutUs') }}">{{ ucfirst($title) }}</a></li>
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
                                <form class="form form-horizontal" action="{{ route('admin.aboutUs.save') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <!-- Start General Information -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">note</i>
                                            About Us Information :
                                        </h4>
                                        <div class="row">
                                            <!-- Start Name -->
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="name">Name</label>
                                                        <input class="form-control border-primary" placeholder="Type Name" type="text" class="form-control" name="name" id="name" value="{{$about?->name}}">
                                                    </div>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="note1">Note 1</label>
                                                        <input class="form-control border-primary" placeholder="Type Phone Number" type="text" class="form-control" name="note1" id="note1" value="{{$about?->note1}}">
                                                    </div>
                                                    @error('note1')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-6" for="note2">Note 2</label>
                                                        <input class="form-control border-primary" placeholder="Type Note 2" type="text" class="form-control" name="note2" id="note2" value="{{$about?->note2}}">
                                                    </div>
                                                    @error('note2')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-6" for="logo">Icon</label>
                                                        <input class="form-control border-primary" type="file" class="form-control" accept="image/*" onchange="previewImage(this);" name="image" id="image">
                                                        <img class="rounded" id="image-preview" width="80px" height="80px" src="{{ $about?->ImagePath() }}" />
                                                    </div>
                                                    @error('image')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Name -->
                                        </div>
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
