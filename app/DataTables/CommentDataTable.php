<?php
namespace App\DataTables;
use App\Models\Comment;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CommentDataTable extends DataTable {
    public function dataTable(QueryBuilder $query): EloquentDataTable {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Comment $comment) {
                return view('admin.comments.btn.actions', compact('comment'));
            })
            ->editColumn('status', function (Comment $comment) {
                return $comment->statusWithLabel();
            })
            ->editColumn('created_at', function (Comment $comment) {
                return $comment->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function (Comment $comment) {
                return $comment->created_at->format('Y-m-d');
            })
            ->rawColumns(['action', 'created_at', 'updated_at',  'status']); 
    }

    public function query(): QueryBuilder {
        return Comment::query();
    }


    public function html() {
		return $this->builder()
            ->setTableId('comment-table')
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
            ['name' => 'title', 'data' => 'title', 'title' => 'title', 'orderable' => false],
            ['name' => 'body', 'data' => 'body', 'title' => 'body', 'orderable' => false],
            ['name' => 'email', 'data' => 'email', 'title' => 'email', 'orderable' => false],
            ['name' => 'status', 'data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false,],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Created At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => 'Update At', 'orderable' => false, 'searchable' => false,],
            ['name' => 'action', 'data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false],
        ];
	}

    protected function filename(): string {
        return 'Comment_' . date('YmdHis');
    }
}