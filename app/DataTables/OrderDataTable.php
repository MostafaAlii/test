<?php

namespace App\DataTables;
use App\Models\Order;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
class OrderDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Order $order) {
                return view('admin.orders.btn.actions', compact('order'));
            })
            ->addColumn('user', function (Order $order) {
                return $order->user->name ?? null;
            })
            ->editColumn('type', function (Order $order) {
                return $order->typeWithLabel();
            })
            ->addColumn('photo_count', function (Order $order) {
                $details = $order->orderDetails()
                    ->join('order_services', 'order_details.order_service_id', '=', 'order_services.id')
                    ->select('order_details.photo_count', 'order_services.name as service_name', 'order_details.total')
                    ->get() ?? null;

                $countsAndServices = [];
                foreach ($details as $detail) {
                    $countsAndServices[] = $detail->photo_count . ' - ' . $detail->service_name . ' ($' . $detail->total . ')';
                }
                $result = implode(', <br>', $countsAndServices);
                return $result;
            })

            ->addColumn('total', function (Order $order) {
                return $order->orderDetails()->sum('total') ?? null;
            })
            ->addColumn('status', function (Order $order) {
                return  $order->orderDetailsOne!= null ? $order->orderDetailsOne->status() :null;
            })
            ->editColumn('created_at', function (Order $order) {
                return $order->created_at->format('Y-m-d') ?? null;
            })
            ->editColumn('updated_at', function (Order $order) {
                return $order->created_at->format('Y-m-d') ?? null;
            })
            ->rawColumns(['action','user', 'type', 'status', 'total', 'photo_count', 'created_at', 'updated_at']);
    }
    public function query(): QueryBuilder {
        return Order::query()->orderBy('id', 'desc')->with(['user', 'orderDetails']);
    }

    public function html() {
        return $this->builder()
            ->setTableId('order-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 'All Records']],
                'buttons'    => [
                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => 'Print'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => 'Export CSV'],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => 'Export EXCEL'],
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => 'Refresh'],

                ],
            ]);
    }

    protected function getColumns() {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#','searchable' => false,],
            ['name' => 'slug', 'data' => 'slug', 'title' => 'Referance','searchable' => false,],
            ['name' => 'user', 'data' => 'user', 'title' => 'Username', 'orderable' => false, 'searchable' => false,],
            ['name' => 'type', 'data' => 'type', 'title' => 'Type', 'orderable' => false, 'searchable' => false,],
            ['name' => 'status', 'data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false,],
            ['name' => 'photo_count', 'data' => 'photo_count', 'title' => 'Service / Photo', 'orderable' => false, 'searchable' => false,],
            ['name' => 'total', 'data' => 'total', 'title' => 'Total', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    protected function filename(): string {
        return 'Order_' . date('YmdHis');
    }
}
