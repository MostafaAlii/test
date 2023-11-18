<?php
namespace App\DataTables;
use App\Models\Button;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ButtonDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Button $button) {
                return view('admin.buttons.btn.actions', compact('button'));
            })
            ->editColumn('created_at', function (Button $button) {
                return $button->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (Button $button) {
                return $button->created_at->format('Y-m-d');
            })
            ->editColumn('status', function (Button $button) {
                return $button->statusWithLabel();
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'status']); 
    }

    public function query(): QueryBuilder {
        return Button::query();
    }


    public function html() {
		return $this->builder()
            ->setTableId('button-table')
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
            ['name' => 'name', 'data' => 'name', 'title' => 'name', 'orderable' => false],
            ['name' => 'type', 'data' => 'type', 'title' => 'type', 'orderable' => false],
            ['name' => 'url', 'data' => 'url', 'title' => 'url', 'orderable' => false],
            ['name' => 'status', 'data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
	}

    protected function filename(): string {
        return 'Button_' . date('YmdHis');
    }
}