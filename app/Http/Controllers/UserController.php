<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }


    public function index()
    {

        $users = User::with('role', 'permissions')->get();

        return view('panel.user.index', compact('users'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $user->load('role', 'permissions');

        return view('panel.user.edit', compact('user', 'permissions', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->refreshPermission($request->permissions);
        $user->refreshRole($request->roles);

        return back()->with('successfull edit');
    }
}
