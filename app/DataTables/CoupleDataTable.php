<?php
namespace App\DataTables;
use App\Models\Couple;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CoupleDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Couple $couple) {
                return view('admin.couples.btn.actions', compact('couple'));
            })
            ->editColumn('created_at', function (Couple $couple) {
                return $couple->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (Couple $couple) {
                return $couple->created_at->format('Y-m-d');
            })
            ->rawColumns(['action', 'created_at', 'updated_at']); 
    }

    public function query(): QueryBuilder {
        return Couple::query();
    }


    public function html() {
		return $this->builder()
            ->setTableId('couple-table')
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
            ['name' => 'note', 'data' => 'note', 'title' => 'note', 'orderable' => false],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
	}

    protected function filename(): string {
        return 'Couple_' . date('YmdHis');
    }
}