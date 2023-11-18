@extends('website.layouts.dashboard')

@section('pageTitle')
    Create Order
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
                    <div class="contents create-order-cont">
                        <h1>Create Order</h1>
                        <div class="oredr-id float-left">
                            Order <span>#{{ $order->slug }}</span>
                        </div>
                        <div class="create-order-btns">
                            <button type="button" class="add-service-btn float-right btn" id="add-service"
                                data-toggle="modal" data-target="#serviceModal{{ $order->id }}">
                                <i class="jam jam-plus"></i>
                                Add Service
                            </button>
                        </div>
                    </div>
                    @include('website.dashboard.modals.services_modal')
                </div>
                <!-- End Dynamic Content -->
            </div>
            <!-- End Dashboard -->
        </div>
    </div>
@endsection

@section('js')
@endsection
