@extends('admin.admin_master')

@section('pageTitle')
Order - {{ $order?->slug }}
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
                        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a>
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
        @include('admin.messages')
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow-none">
                <div class="card shadow mb-0">
                    <div class="card-header py-3 d-flex">
                        <div class="mr-auto">
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="post" id="typeForm">
                                @csrf
                                @method('POST')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row align-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div
                                                            class="input-group-text font-weight-bold font-weight-italic">
                                                            Order Status {!! $order->typeWithLabel() !!}</div>
                                                    </div>
                                                    <select class="form-control form-control-md" id="manageOrderStatus"
                                                        name="type">
                                                        <option value="">Order Status</option>
                                                        <option value="waiting" {{ old('type', request()->input('type'))
                                                            == 'waiting' ? 'selected' : '' }}>
                                                            waiting</option>
                                                        <option value="progress" {{ old('type', request()->
                                                            input('type')) == 'progress' ? 'selected' : '' }}>
                                                            progress</option>
                                                        <option value="completed" {{ old('type', request()->
                                                            input('type')) == 'completed' ? 'selected' : '' }}>
                                                            completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <section id="collapsible" role="tablist">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card default-collapse collapse-icon accordion-icon-rotate">
                                <a id="headingCollapse31" class="card-header bg-success" data-toggle="collapse"
                                    href="#collapse31" aria-expanded="true" aria-controls="collapse31">
                                    <div class="card-title lead white">
                                        <i class="ft-activity mr-50"></i>
                                        Order Details
                                    </div>
                                </a>
                                <div id="collapse31" role="tabpanel" aria-labelledby="headingCollapse31"
                                    class="card-collapse collapse show" aria-expanded="true">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="col-lg-12 col-xl-12">
                                                <h5 class="card-title">
                                                    {{ $order->user->name . ' / ' . $order->user->email }}</h5>
                                                <p class="text-success">Order Code :: {{ $order->slug }}</p>
                                                <p class="text-primary">Retouch Service Name ::
                                                    {{ $order->retouch->retouchService->name }}</p>
                                                @foreach ($order->orderDetails as $orderDetail)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label col-form-label-sm font-weight-bolder">Service
                                                                Name:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $orderDetail->service->name }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label col-form-label-sm font-weight-bolder">Photo
                                                                Count:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->serviceImages->where('type',
                                                                'main')->where('order_service_id',
                                                                $orderDetail->service->id)->count()
                                                                +$order->serviceImages->where('type',
                                                                'referance')->where('order_service_id',
                                                                $orderDetail->service->id)->count() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label col-form-label-sm font-weight-bolder">Main
                                                                Photos:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->serviceImages->where('type',
                                                                'main')->where('order_service_id',
                                                                $orderDetail->service->id)->count() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label col-form-label-sm font-weight-bolder">Reference
                                                                Photos:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->serviceImages->where('type',
                                                                'referance')->where('order_service_id',
                                                                $orderDetail->service->id)->count() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group text-center">
                                                            <label
                                                                class="col-form-label text-success col-form-label-sm font-weight-bolder">Ternaround
                                                                Time:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->orderServiceNotes->where('order_service_id',
                                                                $orderDetail->service->id)->first()?->orderServiceTime?->name
                                                                }}
                                                                -
                                                                ${{ $order->orderServiceNotes->where('order_service_id',
                                                                $orderDetail->service->id)->first()?->orderServiceTime?->price
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="col-form-label col-form-label-sm font-weight-bolder">Service
                                                                Notes For
                                                                {{ $orderDetail->service->name }}:</label>
                                                            <p class="mt-1 font-italic">
                                                                {{ $order->orderServiceNotes->where('order_service_id',
                                                                $orderDetail->service->id)->pluck('notes')->implode('<br>')
                                                                }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endforeach
                                                <br>
                                                @if(file_exists('dashboard/img/order/' . $order->user->name . '/' .
                                                $order->slug . '.' . 'zip'))
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group text-center">
                                                            <a class="mt-1 font-italic"
                                                                href="{{ asset('dashboard/img/order/' . $order->user->name . '/' . $order->slug . '.' . 'zip') }}">
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
<!-- End Breadcrumbs -->
@endsection

@section('js')
<script>
    const manageOrderStatus = document.getElementById('manageOrderStatus');
        manageOrderStatus.addEventListener('change', function() {
            document.getElementById('typeForm').submit();
        });
</script>
@endsection