<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\Workshop;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('workshop')->paginate(10);
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workshops = Workshop::all();
        return view('departments.create', compact('workshops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $workshops = Workshop::all();
        return view('departments.edit', compact('department', 'workshops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }

    public function trashed()
    {
        $deletedDepartments = Department::onlyTrashed()->paginate(10);
        return view('departments.trashed', compact('deletedDepartments'));
    }

    /**
     * Restore a soft deleted factory.
     */
    public function restore($id)
    {
        $department = Department::onlyTrashed()->findOrFail($id);
        $department->restore();
        return redirect()->route('departments.trashed')->with('success', 'Department restored successfully.');
    }

    /**
     * Permanently delete a factory.
     */
    public function forceDelete($id)
    {
        $department = Department::onlyTrashed()->findOrFail($id);
        $department->forceDelete();
        return redirect()->route('departments.trashed')->with('success', 'Department permanently deleted.');
    }
}
