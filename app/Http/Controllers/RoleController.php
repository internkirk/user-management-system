<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::all();

        return view('panel.roles.index',compact('roles'));
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role->load('permissions');
        return view('panel.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->refreshPermission($request->permissions);

        $request->validate([
            'persian_name' => ['required','string','max:255']
        ]);

        $role->update([
            'persian_name' => $request->persian_name,
        ]);

        return back();
    }


    public function create()
    {
        return view('panel.roles.create');
    }

    public function store(Request $request)
    {

        
        $request->validate([
            "role" => ['required','max:255'],
            "persian_name" => ['required','min:3','max:255']
        ]);


        Role::create([
            'name' => $request->role,
            'persian_name' => $request->persian_name,
        ]);

        return back();
    }
}
