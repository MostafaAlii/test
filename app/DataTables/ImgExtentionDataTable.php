<?php
namespace App\DataTables;
use App\Models\ImgExtension;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ImgExtentionDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (ImgExtension $img_ext) {
                return view('admin.imgExtension.btn.actions', compact('img_ext'));
            })
            ->editColumn('created_at', function (ImgExtension $img_ext) {
                return $img_ext->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (ImgExtension $img_ext) {
                return $img_ext->created_at->format('Y-m-d');
            })
            ->rawColumns(['action', 'created_at', 'updated_at']); 
    }

    public function query(): QueryBuilder {
        return ImgExtension::query();
    }


    public function html() {
		return $this->builder()
            ->setTableId('img_ext-table')
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
            ['name' => 'ext', 'data' => 'ext', 'title' => 'Extension', 'orderable' => false],
            ['name' => 'description', 'data' => 'description', 'title' => 'Description', 'orderable' => false],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
	}

    protected function filename(): string {
        return 'ImgExtension_' . date('YmdHis');
    }
}