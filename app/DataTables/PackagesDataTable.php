<?php

namespace App\DataTables;

use App\Models\Package;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PackagesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Package $package) {
                return view('admin.packages.btn.actions', compact('package'));
            })
            ->editColumn('services', function (Package $package) {
                return $package->service->name;
            })
            ->editColumn('status', function (Package $package) {
                return $package->statusWithLabel();
            })
            ->editColumn('created_at', function (Package $package) {
                return $package->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (Package $package) {
                return $package->created_at->format('Y-m-d');
            })
            ->addColumn('image', function (Package $slider) {
                return '<img src="' . $slider->ImagePath() . '" width="100">';
            })
            ->rawColumns(['action', 'status', 'created_at', 'updated_at', 'image','services']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Package $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */

    public function html() {
        return $this->builder()
            ->setTableId('slider-table')
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
                'initComplete' => " function () {
		            this.api().columns([1]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",

            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    protected function getColumns() {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#','searchable' => false,],
            ['name' => 'name', 'data' => 'name', 'title' => 'Name',],
            ['name' => 'image', 'data' => 'image', 'title' => 'Image', 'orderable' => false, 'searchable' => false,],
            ['name' => 'notes', 'data' => 'notes', 'title' => 'Notes',],
            ['name' => 'status', 'data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false,],
            ['name' => 'services', 'data' => 'services', 'title' => 'services', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
//            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }
    protected function filename(): string
    {
        return 'Package_' . date('YmdHis');
    }
}
