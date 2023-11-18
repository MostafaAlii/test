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
                <i class="material-icons">image</i>
                {{ ucfirst($title) }}
            </h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route( $title . '.index') }}">{{ ucfirst($title) }}</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <div class="content-wrapper">
        <div class="content-body">
            @include('admin.messages')
            <hr>
            <!-- Start Table -->
            <div class="table-responsive">
                {!! $dataTable->table(['class'=>'table table-striped table-bordered zero-configuration', 'style' => 'border-collapse: collapse; border-spacing: 0; width: 100%;'],true) !!}
            </div>
            <!-- End Table -->
        </div>
    </div>
@endsection

@section('js')
    {!! $dataTable->scripts() !!}
@endsection
