@extends('admin.admin_master')

@section('pageTitle')
Free Order - {{ $order?->slug }}
@endsection

@section('css')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Start Breadcrumbs -->
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">
                <i class="material-icons">add_shopping_cart</i>
                {{ $order?->slug }}
            </h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('freeOrders.index') }}">Free Orders</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" style="text-decoration: none; color: black;">
                                Order Details / {{ $order->slug }}
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Content Body -->
    <div class="content-body">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow-none">
                <section id="collapsible" role="tablist">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card default-collapse collapse-icon accordion-icon-rotate">
                                <a id="headingCollapse31" class="card-header bg-success" data-toggle="collapse" href="#collapse31" aria-expanded="true"
                                    aria-controls="collapse31">
                                    <div class="card-title lead white">
                                        <i class="ft-activity mr-50"></i>
                                        Order Details
                                    </div>
                                </a>
                                <div id="collapse31" role="tabpanel" aria-labelledby="headingCollapse31" class="card-collapse collapse show"
                                    aria-expanded="true">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="col-lg-12 col-xl-12">
                                                <h5 class="card-title">
                                                    {{ $order->name . ' / ' . $order->email }}</h5>
                                                <p class="text-success">Order Code :: {{ $order->slug }}</p>
                                                @foreach ($order->freeOrderDetails as $freeOrderDetail)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-form-label-sm font-weight-bolder">Service
                                                                Name:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $freeOrderDetail->service->name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-form-label-sm font-weight-bolder">Photo
                                                                Count:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->freeServiceImages->where('type',
                                                                'main')->where('order_service_id',
                                                                $freeOrderDetail->service->id)->count()
                                                                +$order->freeServiceImages->where('type',
                                                                'referance')->where('order_service_id',
                                                                $freeOrderDetail->service->id)->count() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-form-label-sm font-weight-bolder">Main
                                                                Photos:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->freeServiceImages->where('type',
                                                                'main')->where('order_service_id',
                                                                $freeOrderDetail->service->id)->count() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-form-label-sm font-weight-bolder">Reference
                                                                Photos:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->freeServiceImages->where('type',
                                                                'referance')->where('order_service_id',
                                                                $freeOrderDetail->service->id)->count() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-form-label-sm font-weight-bolder">Service
                                                                Notes For
                                                                {{ $freeOrderDetail->service->name }}:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->FreerderServiceNotes->where('order_service_id',
                                                                $freeOrderDetail->service->id)->pluck('notes')->implode('<br>')
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endforeach
                                                <br>
                                                @if(file_exists('dashboard/img/free_order/' . $order->name . '_' . $order->email . '/' .
                                                $order->slug . '.' . 'zip'))
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group text-center">
                                                            <a class="mt-1 font-italic"
                                                                href="{{ asset('dashboard/img/free_order/' . $order->name . '_' . $order->email . '/' . $order->slug . '.' . 'zip') }}">
                                                                Click To Download Zip File
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End Content Body -->
</div>
@endsection