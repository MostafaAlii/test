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
                    <li class="breadcrumb-item"><a href="{{ route('admin.mainHome') }}">{{ ucfirst($title) }}</a></li>
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
                                <form class="form form-horizontal" action="{{ route('admin.mainHome.save') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <!-- Start General Information -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">home</i>
                                            General Information :
                                        </h4>
                                        <div class="row">
                                            <!-- Start Name -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="title">Title</label>
                                                        <input class="form-control border-primary" placeholder="Type Name" type="text" class="form-control" name="title" id="title" value="{{$home?->title}}">
                                                    </div>
                                                    @error('title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="phone">Description</label>
                                                        <input class="form-control border-primary" placeholder="Type Description" type="text" class="form-control" name="description" id="description" value="{{$home?->description}}">
                                                    </div>
                                                    @error('description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Name -->
                                        </div>
                                        <!-- Start Services Gallery Title And Description -->
                                        <div class="row">
                                            <!-- Start Services Gallery Title -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="title">Service Title</label>
                                                        <input class="form-control border-primary" placeholder="Type Name" type="text" class="form-control" name="service_title" id="service_title" value="{{$home?->service_title}}">
                                                    </div>
                                                    @error('service_title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Services Gallery Title -->
                                            <!-- Start Services Gallery Color Title -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-6" for="title">Service Color Slug</label>
                                                        <input class="form-control border-primary" placeholder="Service Color Slug" type="text" class="form-control" name="service_title_colored" id="service_title_colored" value="{{$home?->service_title_colored}}">
                                                    </div>
                                                    @error('service_title_colored')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Services Gallery Color Title -->
                                            <!-- Start Services Gallery Description -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-6" for="home_compression_title">Services Gallery Description</label>
                                                        <textarea id="notes" rows="5" class="form-control" name="service_gallery_description">{!! $home?->service_gallery_description !!}</textarea>
                                                    </div>
                                                    @error('service_gallery_description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Services Gallery Description -->
                                        </div>
                                        <!-- End Services Gallery Title And Description -->
                                        <!-- End General Information -->

                                        <!-- Start Comparison Slide -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">images</i>
                                            Comparison Slide :
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label for="phone">Comparison Slide: <span style="color:rgb(199, 8, 8)">*</span></label>
                                                        <input class="form-control img" name="home_compressions[]" type="file" accept="image/*" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-4" for="home_compression_title">Comparison Title</label>
                                                        <input class="form-control border-primary" placeholder="Type Title" type="text" class="form-control" name="home_compression_title" id="home_compression_title" value="{{$home?->home_compression_title}}">
                                                    </div>
                                                    @error('home_compression_title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label for="home_compression_description">Comparison Description</label>
                                                        <textarea id="notes" rows="5" class="form-control" name="home_compression_description">{!! $home?->home_compression_description !!}</textarea>
                                                    </div>
                                                    @error('home_compression_description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Comparison Slide -->

                                        <!-- Start Home Navigation Slide -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">images</i>
                                            Home Banner :
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label for="phone">Home Banner: <span style="color:rgb(199, 8, 8)">*</span></label>
                                                        <input class="form-control img" name="home_banner[]" type="file" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Home Navigation Slide -->

                                        <!-- Start Notes -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">note</i>
                                            Notes :
                                        </h4>
                                        <div class="row">
                                            <!-- Start Name -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="title">Note 1</label>
                                                        <input class="form-control border-primary" placeholder="Type Note 1" type="text" class="form-control" name="note1" id="note1" value="{{$home?->note1}}">
                                                    </div>
                                                    @error('note1')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="phone">Note 2</label>
                                                        <input class="form-control border-primary" placeholder="Type Note 2" type="text" class="form-control" name="note2" id="note2" value="{{$home?->note2}}">
                                                    </div>
                                                    @error('note2')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Name -->
                                        </div>
                                        <div class="row">
                                            <!-- Start Name -->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="title">Note 3</label>
                                                        <input class="form-control border-primary" placeholder="Type Note 3" type="text" class="form-control" name="note3" id="note3" value="{{$home?->note3}}">
                                                    </div>
                                                    @error('note3')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="phone">Note 4</label>
                                                        <input class="form-control border-primary" placeholder="Type Note 4" type="text" class="form-control" name="note4" id="note4" value="{{$home?->note4}}">
                                                    </div>
                                                    @error('note4')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Name -->
                                        </div>
                                        <!-- End Notes -->
                                        
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
        function previewImageB1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview_banner_1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function previewImageB2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview_banner_2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
