<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrigadeRequest;
use App\Http\Requests\UpdateBrigadeRequest;
use App\Models\Brigade;

class BrigadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brigades = Brigade::paginate(10);

        return view('brigades.index', compact('brigades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brigades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrigadeRequest $request)
    {
        Brigade::create($request->validated());

        return redirect()->route('brigades.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brigade $brigade)
    {
        return view('brigades.show', compact('brigade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brigade $brigade)
    {
        return view('brigades.edit', compact('brigade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrigadeRequest $request, Brigade $brigade)
    {
        $brigade->update($request->validated());

        return redirect()->route('brigades.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brigade $brigade)
    {
        $brigade->delete();
        return redirect()->route('brigades.index')->with('success', __('message.deleted_successfully'));
    }

    /**
     * Display a listing of the trashed brigades.
     */
    public function trashed()
    {
        $brigades = Brigade::onlyTrashed()->paginate(10);

        return view('brigades.trashed', compact('brigades'));
    }

    /**
     * Restore the specified brigade from trash.
     */
    public function restore($id)
    {
        $brigade = Brigade::withTrashed()->findOrFail($id);
        $brigade->restore();

        return redirect()->route('brigades.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Force delete the specified brigade.
     */
    public function forceDelete($id)
    {
        $brigade = Brigade::withTrashed()->findOrFail($id);
        $brigade->forceDelete();

        return redirect()->route('brigades.trashed')->with('success', __('message.permanently_deleted'));
    }
}
