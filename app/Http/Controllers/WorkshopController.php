<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Models\Workshop;
use App\Models\Factory;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workshops = Workshop::with('factory')->paginate(10);

        return view('workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $factories = Factory::all();

        return view('workshops.create', compact('factories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkshopRequest $request)
    {
        Workshop::create($request->validated());

        return redirect()->route('workshops.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        return view('workshops.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        $factories = Factory::all();

        return view('workshops.edit', compact('workshop', 'factories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkshopRequest $request, Workshop $workshop)
    {
        $workshop->update($request->validated());

        return redirect()->route('workshops.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();

        return redirect()->route('workshops.index')->with('success', __('message.deleted_successfully'));
    }

    public function trashed()
    {
        $deletedWorkshops = Workshop::onlyTrashed()->paginate(10);

        return view('workshops.trashed', compact('deletedWorkshops'));
    }

    /**
     * Restore a soft deleted factory.
     */
    public function restore($id)
    {
        $workshop = Workshop::onlyTrashed()->findOrFail($id);
        $workshop->restore();

        return redirect()->route('workshops.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Permanently delete a factory.
     */
    public function forceDelete($id)
    {
        $workshop = Workshop::onlyTrashed()->findOrFail($id);
        $workshop->forceDelete();

        return redirect()->route('workshops.trashed')->with('success', __('message.permanently_deleted'));
    }

    /**
     * Get workshops by factory ID.
     */
    public function byFactory($factoryId)
    {
        $workshops = Workshop::where('factory_id', $factoryId)->get();

        return response()->json($workshops);
    }
}
