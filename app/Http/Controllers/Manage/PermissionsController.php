<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\PermissionsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Response;
use Spatie\Permission\Models\Permission;
use function redirect;

class PermissionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionsDataTable $dataTable)
    {
        return $dataTable->render('pages.manage.permissions.index');
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contents = View::make('partials.modals.permissions._main');
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create($request->only('name'));

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Permissão criada com sucesso!'
        ];

        return redirect()->intended('manage/permissions')->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {

        $contents = View::make('partials.modals.permissions._main')
                        ->with('permission', $permission);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Permission  $permission
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$permission->id
        ]);

        $permission->update($request->only('name'));

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Permissão alterada com sucesso!'
        ];

        return redirect()->intended('manage/permissions')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Permissão apagada com sucesso!'
        ];

        return redirect()->intended('manage/permissions')->with('message', $message);
    }
}
