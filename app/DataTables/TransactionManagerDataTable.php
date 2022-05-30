<?php

namespace App\DataTables;

use App\Models\Transaction;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransactionManagerDataTable extends DataTable
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
            ->rawColumns(['status'])
            ->editColumn('id', function (Transaction $model) {
                return $model->uuid;
            })
//            ->addColumn('operations', function (Transaction $model) {
//                return count($model->operations());
//            })
            ->editColumn('type', function (Transaction $model) {
                return __($model->type);
            })
            ->addColumn('events', function (Transaction $model) {
                return count($model->events);
            })
            ->editColumn('user_id', function (Transaction $model) {
                return $model->user ? $model->user->first_name.' '.$model->user->last_name : '';
            })
            ->editColumn('created_at', function (Transaction $model) {
                return $model->created_at->format('d M, Y H:i:s');
            })
            ->editColumn('status', function (Transaction $model) {

                $styles = [
                    'awaiting-approval' => 'warning',
                    'ready-to-process'  => 'primary',
                    'failed'            => 'danger',
                    'disapproved'       => 'danger',
                    'processing'        => 'primary',
                    'completed'         => 'success',
                ];
                $style = $styles[$model->status];

                return '<div class="badge badge-light-'.$style.' fw-bolder">'.__("$model->status").'</div>';
            })
//            ->addColumn('events-list', function (Transaction $model) {
//                $content = $model;
//                return view('pages.manage.transactions._details', compact('content'));
//            })
            ->setRowAttr(['data-transaction' => function (Transaction $model) { return $model->uuid; }])
//            ->addColumn('controls', function (Transaction $model) {
//                if ($model->status === 'pending')
//                    return view('pages.manage.transactions._action-menu', compact('model'));
//            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param  Transaction  $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transaction $model)
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
            ->setTableId('transaction-manager-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->stateSave(true)
            ->orderBy(4)
            ->responsive()
            ->autoWidth(true)
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
            Column::make('id')->title('Transaction ID')
                ->addClass('text-start')
                ->printable(false)
                ->exportable(false),
            Column::make('user_id')->title(__('Favorecido'))
                ->addClass('text-center'),
            Column::make('type')->title(__('Tipo'))
                ->addClass('text-center'),
            Column::make('events')->title(__('Eventos'))
                ->addClass('text-center'),
            Column::make('created_at')->title(__('Criado em'))
                ->addClass('text-center'),
            Column::make('status')->title(__('Status'))
                ->addClass('text-center'),
//            Column::make('events-list')->title('')
//                ->addClass('none'),
//            Column::computed('controls')
//                ->title(__('Controle'))
//                ->exportable(false)
//                ->printable(false)
//                ->addClass('text-center')
//                ->responsivePriority(-1)
//                ->width(100),
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
