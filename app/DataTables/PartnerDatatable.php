<?php
namespace App\DataTables;
use App\Models\Partner;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PartnerDatatable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Partner $partner) {
                return view('admin.partners.btn.actions', compact('partner'));
            })
            ->editColumn('status', function (Partner $partner) {
                return $partner->statusWithLabel();
            })
            ->editColumn('created_at', function (Partner $partner) {
                return $partner->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (Partner $partner) {
                return $partner->created_at->format('Y-m-d');
            })
            ->addColumn('image', function (Partner $partner) {
                return '<img src="' . $partner->ImagePath() . '" width="100">';
            })
            ->rawColumns(['action', 'status', 'created_at', 'updated_at', 'image']); 
    }

    public function query(): QueryBuilder {
        return Partner::query();
    }


    public function html() {
		return $this->builder()
            ->setTableId('partner-table')
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
            ['name' => 'image', 'data' => 'image', 'title' => 'Image', 'orderable' => false, 'searchable' => false,],
            ['name' => 'status', 'data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
	}

    protected function filename(): string {
        return 'Icon_' . date('YmdHis');
    }
}