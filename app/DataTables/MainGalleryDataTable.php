<?php

namespace App\DataTables;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class MainGalleryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Gallery $gallery) {
                return view('admin.mainGallery.btn.actions', compact('gallery'));
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Gallery $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */

    public function html() {
        return $this->builder()
            ->setTableId('main-gallery-table')
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
            ['name' => 'note', 'data' => 'note', 'title' => 'Note',],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
    }

    protected function filename(): string
    {
        return 'MainGallery_' . date('YmdHis');
    }
}