<?php

namespace App\DataTables;

use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RolesDataTable extends DataTable
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
            ->rawColumns(['controls'])
            ->editColumn('name', function (Role $model) {
                return $model->name;
            })
            ->editColumn('properties', function (Role $model) {
                $permissions = $model->permissions;
                return view('pages.manage.roles._details')
                    ->with('permissions', $permissions);
            })
            ->addColumn('controls', function (Role $model) {
                return '<button data-url="'.route('roles.edit', $model->id).'" class="open-master-modal btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#master-modal">Editar</button>';
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param  Role  $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
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
            ->setTableId('roles-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->stateSave(true)
            ->orderBy(0)
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
            Column::make('name')->title(__('Nome'))
                ->addClass('text-center')
            ->width(500),
            Column::make('properties')->title('')->addClass('none'),
            Column::computed('controls')
                ->title(__('Controle'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->responsivePriority(-1),
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
