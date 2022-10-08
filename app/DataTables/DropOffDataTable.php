<?php

namespace App\DataTables;

use App\Models\Admin\DropOff;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class DropOffDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->editColumn('created_at', function ($data) {
            return $data->updated_at->format('d-M-Y'); // human readable format
        })
        ->editColumn('updated_at', function ($data) {
            return $data->updated_at->format('d-M-Y'); // human readable format
        })

        ->editColumn('action', function($data) {

            $btn = [
                'class_name' => 'btn-success',
                'icon' => '<i class="ft-edit"></i>', 
            ];
            
            return 
            '<div class="d-flex action-btn">
                <a data-id="'.$data->id.'" class="btn btn-icon '. $btn['class_name'] .' edit-btn" href="#">'. $btn['icon'] .'</a>
                <a data-id="'.$data->id.'" class="btn btn-icon btn-danger delete-data" href=""><i class="ft-trash-2"></i></a> 
            </div>';
        })
        ->setRowId('id', 'No');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DropOff $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DropOff $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->addIndex()
        ->setTableId('slider-table')->addTableClass('table table-striped table-bordered zero-configuration dataTable')->autoWidth()
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('lBfrtip')
        ->orderBy(2);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make(['name' => 'DT_RowIndex', 'title' => 'SL', 'data' => 'DT_RowIndex'])->orderable(false)->searchable(false),
            Column::make('title'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'DropOff_' . date('YmdHis');
    }
}
