<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\RolesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;
use Response;
use function redirect;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }

//    public function index(Request $request)
//    {
//        $roles = Role::orderBy('id','DESC')->paginate(5);
//
//
//        return view('pages.manage.roles.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('pages.manage.roles.index');
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::get();
        $rolePermissions = [];

        $contents = View::make('partials.modals.roles._main')
            ->with('permissions', $permissions)
            ->with('rolePermissions', $rolePermissions);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Perfil criado com sucesso!'
        ];

        return redirect()->intended('manage/roles')->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        $contents = View::make('partials.modals.roles._main')
            ->with('role', $role)
            ->with('permissions', $permissions)
            ->with('rolePermissions', $rolePermissions);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Perfil alterado com sucesso!'
        ];

        return redirect()->intended('manage/roles')->with('message', $message);
    }

}
