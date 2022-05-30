<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->rawColumns(['role', 'controls'])
            ->editColumn('id', function (User $model) {
                return $model->uuid;
            })
            ->editColumn('name', function (User $model) {
                return $model->name;
            })
            ->addColumn('email', function (User $model) {
                return $model->email;
            })
            ->editColumn('role', function (User $model) {
                $role['name'] = $model->roles[0]->name ?? 'Cliente';
                $role['color'] = $role['name'] !== 'Cliente' ?  'danger' : 'info';
                return '<div class="badge badge-'.$role['color'].'">'.$role['name'].'</div>';
            })
            ->editColumn('created_at', function (User $model) {
                return $model->created_at->format('d M, Y H:i:s');
            })
            ->editColumn('properties', function (User $model) {
                $content = $model;
                $binance_explorer_url = env("BINANCE_EXPLORER_URL");
                $smart_contract_address = env("SMART_CONTRACT_ADDRESS");

                return view('pages.manage.users._details')
                    ->with('content', $content)
                    ->with('binance_explorer_url', $binance_explorer_url)
                    ->with('smart_contract_address', $smart_contract_address)
                    ;
            })
            ->addColumn('controls', function (User $model) {
                return '<button data-url="'.route('users.edit', $model->uuid).'" class="open-master-modal btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#master-modal">Editar</button>';
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param  User  $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('users-table')
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
            Column::make('id')->title('User ID')
                ->addClass('text-start')
                ->printable(false)
                ->orderable(false)
                ->exportable(false),
            Column::make('name')->title(__('Nome'))
                ->addClass('text-center'),
            Column::make('email')->title(__('Email'))
                ->addClass('text-center'),
            Column::make('role')->title(__('role'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('created_at')->title(__('Criado em'))
                ->addClass('text-center'),
            Column::make('properties')->title('')->addClass('none'),
            Column::computed('controls')
                ->title(__('Controle'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->responsivePriority(-1)
                ->width(100),
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
