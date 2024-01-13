<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $request->validated();
        $role = Role::create(['name' => $request->name]);
        $role->permissions()->attach($request->permission);

        $success=[
            'message'=>trans('words.added-successfully'),
            'alert-type'=>'success'
        ];

        return redirect()->route('admin.roles.index')->with($success);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_permissions","role_permissions.permission_id","=","permissions.id")
            ->where("role_permissions.role_id",$id)
            ->get();

        return view('admin.roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_permissions")->where("role_permissions.role_id",$id)
            ->pluck('role_permissions.permission_id','role_permissions.permission_id')
            ->all();

        return view('admin.roles.edit',compact('role','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $request->validated();

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        $role->permissions()->sync($request->permission);

        
         $success=[
            'message'=>trans('words.updated-successfully'),
            'alert-type'=>'success'
        ];

        return redirect()->route('admin.roles.index')->with($success);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach();
        $role->delete();

        $success=[
            'message'=>trans('words.deleted-successfully'),
            'alert-type'=>'error'
        ];

        return redirect()->back()->with($success);
    }
}
