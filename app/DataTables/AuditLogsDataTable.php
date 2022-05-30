<?php

namespace App\DataTables;

use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AuditLogsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  mixed  $query  Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['description', 'properties', 'action'])
            ->editColumn('id', function (Activity $model) {
                return $model->id;
            })
            ->editColumn('subject_id', function (Activity $model) {
                if (!isset($model->subject)) {
                    return '';
                }

                if (isset($model->subject->name)) {
                    return $model->subject->name;
                }

                return $model->subject->user()->first()->name;
            })
            ->editColumn('causer_id', function (Activity $model) {
                return $model->causer ? $model->causer->first_name : __('System');
            })
            ->editColumn('properties', function (Activity $model) {
                $content = $model->properties;
                return view('pages.manage.activities._details', compact('content'));
            })
            ->editColumn('created_at', function (Activity $model) {
                return $model->created_at->format('d M, Y H:i:s');
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param  Activity  $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('audit-log-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->stateSave(true)
            ->orderBy(6, 'desc')
            ->responsive()
            ->autoWidth(false)
            ->parameters([
                'scrollX' => true,
//                'dom' => 'Bfrtlip',
                "dom" => 'ft<"d-flex justify-content-between align-items-center mt-10"ipl>',

//                "buttons" => ['print'],
                'language' => [
                    'url' => url('vendor/datatables/pt-br.lang.json')
                ],
                'paging' => true,
                'searching' => true,
                'lengthChange' => true,
                'ordering' => true,
                'info' => true,
                'searchDelay' => 350,
                "lengthMenu" => [10, 25, 50],
                "pageLength" => 10,
            ])
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('Log ID')->width(100)->addClass('text-center'),
            Column::make('log_name')->title(__('Tipo')),
            Column::make('description')->title(__('Evento')),
            Column::make('subject_type')->title(__('Entidade')),
            Column::make('subject_id')->title(__('Tópico')),
            Column::make('causer_id')->title(__('Autor')),
            Column::make('created_at')->title(__('Criado em')),
            Column::make('properties')->title('Propriedades')->addClass('none'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'DataLogs_'.date('YmdHis');
    }
}
