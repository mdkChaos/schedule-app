<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Models\Workshop;
use App\Models\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class WorkshopController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Workshop::class, 'workshop');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $workshops = Workshop::with('factory')->paginate(10);

        return view('workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $factories = Factory::all();

        return view('workshops.create', compact('factories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkshopRequest $request): RedirectResponse
    {
        Workshop::create($request->validated());

        return redirect()->route('workshops.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop): View
    {
        return view('workshops.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop): View
    {
        $factories = Factory::all();

        return view('workshops.edit', compact('workshop', 'factories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkshopRequest $request, Workshop $workshop): RedirectResponse
    {
        $workshop->update($request->validated());

        return redirect()->route('workshops.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop): RedirectResponse
    {
        $workshop->delete();

        return redirect()->route('workshops.index')->with('success', __('message.deleted_successfully'));
    }

    /**
     * Display a listing of the trashed resources.
     */
    public function trashed(): View
    {
        $deletedWorkshops = Workshop::onlyTrashed()->paginate(10);

        return view('workshops.trashed', compact('deletedWorkshops'));
    }

    /**
     * Restore a soft deleted factory.
     */
    public function restore($id): RedirectResponse
    {
        $workshop = Workshop::onlyTrashed()->findOrFail($id);
        $workshop->restore();

        return redirect()->route('workshops.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Permanently delete a factory.
     */
    public function forceDelete($id): RedirectResponse
    {
        $workshop = Workshop::onlyTrashed()->findOrFail($id);
        $workshop->forceDelete();

        return redirect()->route('workshops.trashed')->with('success', __('message.permanently_deleted'));
    }
}
