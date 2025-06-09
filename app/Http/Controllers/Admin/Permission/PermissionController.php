<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::with('roles')->orderBy('id', 'desc')->get();
        return view('admin.pages.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.permission.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('permissions')->where(function ($query) {
                    return $query->where('guard_name', 'web');
                }),
            ],
            'role_id' => 'nullable',
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name = 'web';
        $permission->save();

        if ($request->role_id) {
            $permission->syncRoles($request->role_id);
        }

        return to_route('permissions.index');
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
    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.pages.permission.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('permissions')->where(function ($query) {
                    return $query->where('guard_name', 'web');
                })->ignore($permission->id),
            ],
            'role_id' => 'nullable|array',
            'role_id.*' => 'exists:roles,id',
        ]);

        $permission->name = $request->name;
        $permission->guard_name = 'web';
        $permission->save();

        $roleNames = [];
        if ($request->has('role_id')) {
            $roleNames = Role::whereIn('id', $request->role_id)->pluck('name')->toArray();
        }
        $permission->syncRoles($roleNames); 
        return to_route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return to_route('permissions.index');
    }
}
