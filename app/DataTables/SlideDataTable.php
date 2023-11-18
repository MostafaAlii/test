<?php
namespace App\DataTables;
use App\Models\Slide;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SlideDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Slide $slide) {
                return view('admin.slides.btn.actions', compact('slide'));
            })
            ->editColumn('status', function (Slide $slide) {
                return $slide->statusWithLabel();
            })
            ->editColumn('created_at', function (Slide $slide) {
                return $slide->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (Slide $slide) {
                return $slide->created_at->format('Y-m-d');
            })
            ->addColumn('image', function (Slide $slide) {
                return '<img src="' . $slide->ImagePath() . '" width="100">';
            })
            ->rawColumns(['action', 'status', 'created_at', 'updated_at', 'image']); 
    }

    public function query(): QueryBuilder {
        return Slide::query();
    }


    public function html() {
		return $this->builder()
            ->setTableId('slide-table')
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

    protected function getColumns() {
		return [
            ['name' => 'id', 'data' => 'id', 'title' => '#','searchable' => false,],
            ['name' => 'name', 'data' => 'name', 'title' => 'Name',],
            ['name' => 'image', 'data' => 'image', 'title' => 'Image', 'orderable' => false, 'searchable' => false,],
            ['name' => 'notes', 'data' => 'notes', 'title' => 'Notes',],
            ['name' => 'status', 'data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
	}

    protected function filename(): string {
        return 'Slide_' . date('YmdHis');
    }
}