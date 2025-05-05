<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCellRequest;
use App\Http\Requests\UpdateCellRequest;
use App\Models\Cell;
use App\Models\Department;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cells = Cell::with('department')->paginate(10);

        return view('cells.index', compact('cells'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('cells.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCellRequest $request)
    {
        Cell::create($request->validated());

        return redirect()->route('cells.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cell $cell)
    {
        return view('cells.show', compact('cell'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cell $cell)
    {
        $departments = Department::all();

        return view('cells.edit', compact('cell', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCellRequest $request, Cell $cell)
    {
        $cell->update($request->validated());

        return redirect()->route('cells.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cell $cell)
    {
        $cell->delete();

        return redirect()->route('cells.index')->with('success', __('message.deleted_successfully'));
    }

    public function trashed()
    {
        $deletedCells = Cell::onlyTrashed()->paginate(10);

        return view('cells.trashed', compact('deletedCells'));
    }

    /**
     * Restore a soft deleted factory.
     */
    public function restore($id)
    {
        $cell = Cell::onlyTrashed()->findOrFail($id);
        $cell->restore();

        return redirect()->route('cells.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Permanently delete a factory.
     */
    public function forceDelete($id)
    {
        $cell = Cell::onlyTrashed()->findOrFail($id);
        $cell->forceDelete();

        return redirect()->route('cells.trashed')->with('success', __('message.permanently_deleted'));
    }
}
