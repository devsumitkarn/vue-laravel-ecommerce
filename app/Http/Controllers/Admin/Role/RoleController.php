<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->orderBy('id', 'desc')->get();
        return view('admin.pages.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $groupedPermissions = [];

        foreach ($permissions as $permission) {
            $parts = explode('-', $permission->name);
            if (count($parts) >= 2) {
                $module = $parts[0];
            } else {
                $module = 'misc';
            }

            $groupedPermissions[$module][] = $permission;
        }
        return view('admin.pages.role.create', compact('permissions', 'groupedPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permission_id' => 'nullable|array',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();

        if ($request->permission_id) {
            $permissions = Permission::whereIn('id', $request->permission_id)->get();
            $role->syncPermissions($permissions);
        }

        return to_route('roles.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $groupedPermissions = [];

        foreach ($permissions as $permission) {
            $parts = explode('-', $permission->name);
            if (count($parts) >= 2) {
                $module = $parts[0];
            } else {
                $module = 'misc';
            }

            $groupedPermissions[$module][] = $permission;
        }

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.pages.role.edit', compact('role', 'permissions', 'groupedPermissions', 'rolePermissions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permission_id' => 'nullable|array',
        ]);

        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();

        if ($request->filled('permission_id')) {
            $permissions = Permission::whereIn('id', $request->permission_id)->get();
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions([]);
        }

        return to_route('roles.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
