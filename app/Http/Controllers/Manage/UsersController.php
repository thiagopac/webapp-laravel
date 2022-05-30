<?php

namespace App\Http\Controllers\Manage;

use App\Core\Services\ServiceAPI;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Response;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{

    protected ServiceAPI $servicesAPI;

    public function __construct()
    {
        $this->servicesAPI = new ServiceAPI();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.manage.users.index');
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @param $uuid
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(String $uuid)
    {
        $user = User::where('uuid',$uuid)->first();
        $userRole = $user->roles->pluck('name')[0] ?? '';

        $contents = View::make('partials.modals.users._main')
            ->with('user', $user)
            ->with('userRole', $userRole)
            ->with('roles', Role::latest()->get());
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        $user->syncRoles($request->get('role'));

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Dados do usuário alterados com sucesso!'
        ];

        return redirect()->intended('manage/users')->with('message', $message);
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $user = new User();

        $contents = View::make('partials.modals.users._main')
            ->with('user', $user)
            ->with('roles', Role::latest()->get());
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Store a newly created user
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        if ($request->role === null){
            $userBalance = new UserBalance();
            $userBalance->user()->associate($user)->save();
            $this->servicesAPI->cryptoCreateWallet($user);
        }

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Usuário criado com sucesso!'
        ];

        return redirect()->intended('manage/users')->with('message', $message);
    }

}

