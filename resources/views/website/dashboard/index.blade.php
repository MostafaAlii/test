@extends('website.layouts.dashboard')

@section('pageTitle')
{{ get_user_data()->name . ' Dashboard' }}
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
                <div class="contents active" id="projects">
                    <h1>Orders</h1>

                    <div class="projects">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">OrderCode</th>
                                    <th scope="col">services</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Download</th>
                                    <th scope="col">OrderCreated</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)

                                <tr>
                                    <th>{{$row->slug}}</th>
                                    <td>{{$row->services->name ?? null}}</td>
                                    <td>{!! $row->typeWithLabel()!!}</td>
                                    <td>
                                        @if($row->type === 'completed')
                                        @if(file_exists('dashboard/img/order/' . $row->user->name . '/' . $row->slug .
                                        '.zip'))
                                        <a class="mt-1 font-italic"
                                            href="{{ asset('dashboard/img/order/' . $row->user->name . '/' . $row->slug . '.zip') }}">
                                            Download
                                        </a>
                                        @else
                                        No Download Link
                                        @endif
                                        @else
                                        No Download Link
                                        @endif
                                    </td>
                                    <td>{!! $row->typeWithLabel()!!}</td>
                                    <td>{{$row->created_at->diffForHumans()}}</td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="no-orders" style="display: none;">No orders to be displayed</div>
                    </div>
                    <div class="no-orders" style="display: block;">No orders to be displayed</div>
                </div>
            </div>
            <!-- End Dynamic Content -->
        </div>
        <!-- End Dashboard -->
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
            const inProcessButton = document.querySelector('[data-id="in-process"]');
            const finishedButton = document.querySelector('[data-id="finished"]');
            const tableBody = document.querySelector("table tbody");
            const noOrdersMessage = document.querySelector(".no-orders");

            inProcessButton.addEventListener("click", function() {
                fetch('/getProcessOrder')
                    .then(response => response.json())
                    .then(data => {
                        populateTable(data);
                    });
            });

            finishedButton.addEventListener("click", function() {
                fetch('/getCompleteOrder')
                    .then(response => response.json())
                    .then(data => {
                        populateTable(data);
                    });
            });

            function populateTable(data) {
                tableBody.innerHTML = "";

                if (data.length > 0) {
                    noOrdersMessage.style.display = "none";
                    data.forEach(item => {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                    <td>${item.id}</td>
                    <td>${item.order_date}</td>
                    <td>${item.product_name}</td>
                `;
                        tableBody.appendChild(row);
                    });
                } else {
                    noOrdersMessage.style.display = "block";
                }
            }
        });
</script>
@endsection