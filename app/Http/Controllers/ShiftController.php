<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::paginate(10);

        return view('shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShiftRequest $request)
    {
        Shift::create($request->validated());

        return redirect()->route('shifts.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        return view('shifts.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        return view('shifts.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        $shift->update($request->validated());

        return redirect()->route('shifts.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('shifts.index')->with('success', __('message.deleted_successfully'));
    }

    /**
     * Display a listing of the trashed resources.
     */
    public function trashed()
    {
        $shifts = Shift::onlyTrashed()->paginate(10);

        return view('shifts.trashed', compact('shifts'));
    }

    /**
     * Restore the specified trashed resource.
     */
    public function restore($id)
    {
        $shift = Shift::withTrashed()->findOrFail($id);
        $shift->restore();

        return redirect()->route('shifts.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Permanently delete the specified trashed resource.
     */
    public function forceDelete($id)
    {
        $shift = Shift::withTrashed()->findOrFail($id);
        $shift->forceDelete();

        return redirect()->route('shifts.trashed')->with('success', __('message.permanently_deleted'));
    }
}
