<?php

namespace App\DataTables;

use App\Models\UserInvoice;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BillHistoryDataTable extends DataTable
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
            ->smart(true)
            ->rawColumns(['file', 'payment'])
            ->editColumn('id', function (UserInvoice $model) {
                return $model->uuid;
            })
            ->editColumn('due_date', function (UserInvoice $model) {
                return ucfirst(\Carbon\Carbon::parse($model->due_date)->translatedFormat('M d, Y'));
            })
            ->addColumn('address', function (UserInvoice $model) {
                return $model->consumerUnit->address.', '.$model->consumerUnit->number.', '.$model->consumerUnit->city->name.'/'.$model->consumerUnit->city->state_letter;
            })
            ->addColumn('consumer_unit', function (UserInvoice $model) {
                return $model->consumerUnit->code;
            })
            ->editColumn('value', function (UserInvoice $model) {
                return "R$ ".number_format($model->value/100, 2, ',', '.');
            })
            ->editColumn('file', function (UserInvoice $model) {
                return "<a target='_blank' href='$model->file'><i class='bi bi-file-earmark-pdf fs-1 text-danger'></i></a>";
            })
            ->editColumn('payment', function (UserInvoice $model) {
                $styles = [
                    'payment-pending'     => 'danger',
                    'payment-processing'  => 'primary',
                    'payment-done'  => 'success',
                ];
                $style = $styles[$model->payment];

                return '<div class="badge badge-light-'.$style.' fw-bolder">'.__("$model->payment").'</div>';
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param  UserInvoice  $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserInvoice $model)
    {
        return $model->newQuery()->where('user_id', '=', auth()->user()->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('invoice-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->stateSave(true)
            ->orderBy(1)
            ->responsive()
            ->autoWidth(true)
            ->parameters([
                'scrollX' => true,
//                'dom' => 'Bfrtlip',
                "dom" => '<"my-10">t<"d-flex justify-content-between align-items-center mt-10"ipl>',

//                "buttons" => ['print'],
                'language' => [
                    'url' => url('vendor/datatables/pt-br.lang.json')
                ],
                'paging' => true,
                'searching' => false,
                'lengthChange' => true,
                'ordering' => false,
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
            Column::make('id')->title(__('ID da fatura'))
                ->addClass('d-none'),
            Column::make('due_date')->title(__('Data de vencimento'))
                ->addClass('text-center')
                ->searchable(true),
            Column::make('address')->title(__('Endereço da instalação')),
            Column::make('consumer_unit')->title(__('Unidade consumidora'))
                ->addClass('text-center'),
            Column::make('value')->title(__('Valor'))
                ->addClass('text-center'),
            Column::make('file')->title(__('Visualizar fatura'))
                ->addClass('text-center'),
            Column::make('payment')->title('Status')
                ->addClass('text-center')
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
