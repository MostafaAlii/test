@extends('website.layouts.dashboard')

@section('pageTitle')
Create Order
@endsection

@section('css')
<link href="{{ asset('website/resources/css/order.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid dashboard-container">
    <div class="row">
        <!-- Start Dashboard -->
        <div class="col-12 col-sm-12 col-md-12">
            <!-- Start Dynamic Content -->
            <div class="dashboard-contents">
                <div class="contents create-order-cont">
                    <div class="oredr-id float-left">
                        Order <span>#{{ $order->slug }}</span>
                    </div>
                    <div class="create-order-btns">
                        <button type="button" class="add-service-btn float-right btn" data-toggle="modal"
                            data-target="#serviceModal{{ $order->id }}">
                            <i class="jam jam-plus"></i>
                            Add Service
                        </button>
                    </div>
                    <!-- Start Modal -->
                    @include('website.dashboard.freeOrder.modals.services_show_modal')
                    <!-- End Modal -->
                    <div>
                        <!-- Start Table -->
                        <table class="w-100 services-summary mt-3 table d-table">
                            <tr class="head">
                                <td width="20%">Selected Services</td>
                                <td width="20%">Cost/Photo</td>
                                <td width="20%">No. of Photo(s)</td>
                                <td width="20%">Turnaround Time</td>
                                <td width="20%">Service(s) Cost</td>
                            </tr>
                            @foreach ($selectedServices as $service)
                            {{-- @dd($service->name) --}}


                            <tr class="table-row" style="display: table-row" id="service-row-{{ $service->name }}">
                                <td class="selectedService {{ $service->name }}_selected_service" class="text-left"
                                    width="20%" data-service-name="{{ $service->name }}"
                                    data-service-price="{{ $service->price }}">
                                    {{ $service->name }}
                                </td>

                                <!-- service cost -->
                                <td class="image-cost" width="20%">${{ $service->price }}</td>

                                <!-- photos count -->
                                <td class="{{ $service->name }}-photos-no" width="20%"
                                    data-service-name="{{ $service->name }}">
                                    0
                                </td>

                                <!-- additional cost per photo -->
                                <td class="{{ $service->name }}-additional-cost" width="20%" data-additional-cost="0">
                                    -
                                </td>

                                <!--  total photos cost  -->
                                <td class="service-price" width="20%" id="service-price-{{ $service->name }}"></td>
                            </tr>
                            @endforeach
                            <tr class="head">
                                <td colspan="4">Grand Total</td>
                                <td colspan="1" id="total-price" class="total-price"></td>
                            </tr>
                        </table>
                        <!-- End Table -->
                        <!-- Service Table -->
                        @includeWhen(!empty($selectedServices),
                        'website.dashboard.freeOrder.modals.service_upload_table')
                        <!-- Service Table -->
                    </div>
                </div>
            </div>
            <!-- End Dynamic Content -->
        </div>
        <!-- End Dashboard -->
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#type").change(function () {
            if ($(this).val() === "payment") {
                $("#typePayments").show();
            } else {
                $("#typePayments").hide();
            }
        });
    });
</script>
@endsection