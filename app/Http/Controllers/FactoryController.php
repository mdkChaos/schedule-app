<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactoryRequest;
use App\Http\Requests\UpdateFactoryRequest;
use App\Models\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FactoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Factory::class, 'factory');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $factories = Factory::paginate(10);

        return view('factories.index', compact('factories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('factories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFactoryRequest $request): RedirectResponse
    {
        Factory::create($request->validated());

        return redirect()->route('factories.index')->with('success', __('message.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Factory $factory): View
    {
        return view('factories.show', compact('factory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factory $factory): View
    {
        return view('factories.edit', compact('factory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactoryRequest $request, Factory $factory): RedirectResponse
    {
        $factory->update($request->validated());

        return redirect()->route('factories.index')->with('success', __('message.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factory $factory): RedirectResponse
    {
        $factory->delete();

        return redirect()->route('factories.index')->with('success', __('message.deleted_successfully'));
    }

    public function trashed(): View
    {
        $deletedFactories = Factory::onlyTrashed()->paginate(10);

        return view('factories.trashed', compact('deletedFactories'));
    }

    /**
     * Restore a soft deleted factory.
     */
    public function restore($id): RedirectResponse
    {
        $factory = Factory::onlyTrashed()->findOrFail($id);
        $factory->restore();

        return redirect()->route('factories.trashed')->with('success', __('message.restored_successfully'));
    }

    /**
     * Permanently delete a factory.
     */
    public function forceDelete($id): RedirectResponse
    {
        $factory = Factory::onlyTrashed()->findOrFail($id);
        $factory->forceDelete();

        return redirect()->route('factories.trashed')->with('success', __('message.permanently_deleted'));
    }
}
