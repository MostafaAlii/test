<?php

namespace App\DataTables;
use App\Models\FreeOrder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
class FreeOrderDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (FreeOrder $order) {
                return view('admin.free-orders.btn.actions', compact('order'));
            })
            ->addColumn('photo_count', function (FreeOrder $order) {
                $details = $order->freeOrderDetails()
                    ->join('order_services', 'free_order_details.order_service_id', '=', 'order_services.id')
                    ->select('free_order_details.photo_count', 'order_services.name as service_name', 'free_order_details.total')
                    ->get() ?? null;

                $countsAndServices = [];
                foreach ($details as $detail) {
                    $countsAndServices[] = $detail->photo_count . ' - ' . $detail->service_name . ' ($' . $detail->total . ')';
                }
                $result = implode(', <br>', $countsAndServices);
                return $result;
            })

            ->addColumn('total', function (FreeOrder $order) {
                return $order->freeOrderDetails()->sum('total') ?? null;
            })
            ->editColumn('created_at', function (FreeOrder $order) {
                return $order->created_at->format('Y-m-d') ?? null;
            })
            ->editColumn('updated_at', function (FreeOrder $order) {
                return $order->created_at->format('Y-m-d') ?? null;
            })
            ->rawColumns(['action','total', 'photo_count', 'created_at', 'updated_at']);
    }
    public function query(): QueryBuilder {
        return FreeOrder::query()->orderBy('id', 'desc')->with(['freeOrderDetails']);
    }

    public function html() {
        return $this->builder()
            ->setTableId('free-order-table')
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
            ['name' => 'name', 'data' => 'name', 'title' => 'name', 'orderable' => false, 'searchable' => false,],
            ['name' => 'email', 'data' => 'email', 'title' => 'email', 'orderable' => false, 'searchable' => false,],
            ['name' => 'photo_count', 'data' => 'photo_count', 'title' => 'Service / Photo', 'orderable' => false, 'searchable' => false,],
            ['name' => 'total', 'data' => 'total', 'title' => 'Total', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    protected function filename(): string {
        return 'FreeOrder_' . date('YmdHis');
    }
}