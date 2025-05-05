<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::paginate(10);

        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        $position = Position::create($request->validated());

        return redirect()->route('positions.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update($request->validated());

        return redirect()->route('positions.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')->with('success', __('message.deleted_successfully'));
    }

    /**
     * Display a listing of the trashed resources.
     */
    public function trashed()
    {
        $positions = Position::onlyTrashed()->paginate(10);

        return view('positions.trashed', compact('positions'));
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        $position = Position::onlyTrashed()->findOrFail($id);
        $position->restore();

        return redirect()->route('positions.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Force delete the specified resource from storage.
     */
    public function forceDelete($id)
    {
        $position = Position::onlyTrashed()->findOrFail($id);
        $position->forceDelete();

        return redirect()->route('positions.trashed')->with('success', __('message.permanently_deleted'));
    }
}
