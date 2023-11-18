@extends('admin.admin_master')

@section('pageTitle')
    {{ ucfirst($title) }}
@endsection

@section('css')
    <style>
        .dataTables_length {
            margin-left: 20px !important;
            padding: 10px !important;
        }
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
                        <li class="breadcrumb-item"><a href="{{ route('orderServiceTime.index') }}">{{ ucfirst($title) }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <div class="content-wrapper">
        <div class="content-body">
            @include('admin.messages')
            <!-- Start Create btn row -->
            <div class="row">
                <div class="col-12">
                    <div class="ml-auto">
                        <a data-target="#create_orderTurnaroundTime" data-toggle="modal" data-effect="effect-scale"
                            class="btn btn-success btn-sm">
                            <span class="icon text-white-50">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">Add New {{ ucfirst($title) }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Create btn row -->
            <hr>
            <!-- Start Table -->
            <div class="table-responsive">
                {!! $dataTable->table(
                    [
                        'class' => 'table table-striped table-bordered zero-configuration',
                        'style' => 'border-collapse: collapse; border-spacing: 0; width: 100%;',
                    ],
                    true,
                ) !!}
            </div>
            @include('admin.orderTurnaroundTime.btn.modals.create')
            <!-- End Table -->
        </div>
    </div>
@endsection

@section('js')
    {!! $dataTable->scripts() !!}
@endsection
