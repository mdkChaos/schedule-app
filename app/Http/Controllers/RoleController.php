<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());

        return redirect()->route('roles.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return redirect()->route('roles.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', __('message.deleted_successfully'));
    }

    /**
     * Display a listing of the trashed resources.
     */
    public function trashed()
    {
        $roles = Role::onlyTrashed()->paginate(10);

        return view('roles.trashed', compact('roles'));
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        $role = Role::onlyTrashed()->findOrFail($id);
        $role->restore();

        return redirect()->route('roles.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Permanently delete the specified resource from storage.
     */
    public function forceDelete($id)
    {
        $role = Role::onlyTrashed()->findOrFail($id);
        $role->forceDelete();

        return redirect()->route('roles.trashed')->with('success', __('message.permanently_deleted'));
    }
}
