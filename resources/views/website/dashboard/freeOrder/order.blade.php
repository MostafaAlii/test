@extends('website.layouts.dashboard')

@section('pageTitle')
Create Order
@endsection

@section('css')
@endsection

@section('content')
<div class="container-fluid dashboard-container">
    <div class="row">
        <!-- Start Dashboard -->
        <div class="col-12 col-sm-12 col-md-12">
            <!-- Start Dynamic Content -->
            <div class="dashboard-contents">
                <div class="contents create-order-cont">
                    <h1>Create Order</h1>
                    <form id="mainForm" action="{{route('website.free-orders.update', $order->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-4">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Type Your Name" name="name">
                                </div>
                                <div class="col-4">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Type Your Email" name="email">
                                </div>
                                <div class="col-4">
                                    <label>Website</label>
                                    <input type="text" class="form-control" placeholder="Type Your Website" name="website">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary mx-auto" id="select-services-btn">Continue</button>
                        </div>
                    </form>
                    <div class="oredr-id float-left">
                        Order <span>#{{ $order->slug }}</span>
                    </div>
                    @if ($order->name && $order->email !== null)
                        <div class="create-order-btns">
                            <button type="button" class="add-service-btn float-right btn" id="add-service" data-toggle="modal"
                                data-target="#serviceModal{{ $order->id }}">
                                <i class="jam jam-plus"></i>
                                Add Service
                            </button>
                        </div>
                    @endif
                </div>
                @include('website.dashboard.freeOrder.modals.services_modal')
            </div>
            <!-- End Dynamic Content -->
        </div>
        <!-- End Dashboard -->
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("select-services-btn").addEventListener("click", function () {
            // Submit the main form
            document.getElementById("mainForm").submit();
            
            // Submit the modal form
            document.getElementById("modalForm").submit();
        });
    });
</script>
@endsection