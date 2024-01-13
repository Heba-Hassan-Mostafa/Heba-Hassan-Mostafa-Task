<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $request->validated();
        Permission::create(['name' => $request->name]);

        $success=[
            'message'=>trans('words.added-successfully'),
            'alert-type'=>'success'
        ];

        return redirect()->route('admin.permissions.index')->with($success);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $request->validated();

        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $request->name]);

         $success=[
            'message'=>trans('words.updated-successfully'),
            'alert-type'=>'success'
        ];

        return redirect()->route('admin.permissions.index')->with($success);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        $success=[
            'message'=>trans('words.deleted-successfully'),
            'alert-type'=>'error'
        ];

        return redirect()->back()->with($success);
    }
}