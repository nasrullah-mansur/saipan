<?php

namespace App\DataTables;

use App\Models\Admin\DropOff;
use App\Models\Admin\PickUp;
use App\Models\Admin\Taxi;
use App\Models\Order\TaxiOrder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class TaxiOrderDataTable extends DataTable
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

        ->editColumn('taxi_id', function($data) {
            return Taxi::where('id', $data->taxi_id)->first('title')->title;
        })

        ->editColumn('status', function($data) {
            if($data->status == 'Open') {
                return '<span class="text-success text-bold">' . $data->status . '</span>';
            }
            if($data->status == 'On Hold') {
                return '<span class="text-danger text-bold">' . $data->status . '</span>';
            }
            if($data->status == 'In Progress') {
                return '<span class="text-warning text-bold">' . $data->status . '</span>';
            }
            if($data->status == 'Closed') {
                return '<span class="text-dark text-bold">' . $data->status . '</span>';
            }

        })

        ->editColumn('pick_up', function($data) {
            return PickUp::where('id', $data->pick_up)->first()->title;
        })

        ->editColumn('drop_off', function($data) {
            return DropOff::where('id', $data->drop_off)->first()->title;
        })

        ->editColumn('action', function($data) {

            $btn = [
                'class_name' => 'btn-success edit-btn',
                'icon' => '<i class="ft-edit"></i>', 
            ];
            
            return 
            '<div class="d-flex action-btn">
                <a data-id="'.$data->id.'" data-taxi_id="'.$data->taxi_id.'" class="btn btn-icon '. $btn['class_name'] .' delete-btn" href="#">'. $btn['icon'] .'</a>
                <a data-id="'.$data->id.'" class="btn btn-icon btn-danger delete-data" href=""><i class="ft-trash-2"></i></a> 
            </div>';
        })
        ->setRowId('id', 'No', 'status');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TaxiOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TaxiOrder $model): QueryBuilder
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
        ->orderBy(8);
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
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('pick_up'),
            Column::make('drop_off'),
            Column::make('date_and_time'),
            Column::make(['name' => 'taxi_id', 'title' => 'Taxi Name', 'data' => 'taxi_id'])->searchable(false),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('status'),
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
        return 'TaxiOrder_' . date('YmdHis');
    }
}
