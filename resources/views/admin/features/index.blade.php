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
                    <li class="breadcrumb-item"><a href="{{ route('admin.feature') }}">{{ ucfirst($title) }}</a></li>
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
                                <form class="form form-horizontal" action="{{ route('admin.feature.save') }}" method="post">
                                    @csrf
                                    <div class="form-body">
                                        <!-- Start General Information -->
                                        <h4 class="form-section">
                                            <i class="mr-1 material-icons">note</i>
                                            Features Information :
                                        </h4>
                                        <div class="row">
                                            <!-- Start Name -->
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <div class="mx-auto col-md-9">
                                                        <label class="col-md-3" for="name">Title</label>
                                                        <input class="form-control border-primary" placeholder="Type Name" type="text" class="form-control" name="name" id="name" value="{{$feature?->name}}">
                                                    </div>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            
                                            <!-- End Name -->
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 form-group col-12">
                                                <label for="notes">Note 1</label>
                                                <textarea id="notes" rows="5" class="form-control" name="note1" placeholder="Note 1">{{ $feature?->note1 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 form-group col-12">
                                                <label for="notes">Note 2</label>
                                                <textarea id="notes" rows="5" class="form-control" name="note2" placeholder="Note 2">{{ $feature?->note2 }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 form-group col-12">
                                                <label for="notes">Note 3</label>
                                                <textarea id="notes" rows="5" class="form-control" name="note3" placeholder="Note 3">{{ $feature?->note3 }}</textarea>
                                            </div>
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
