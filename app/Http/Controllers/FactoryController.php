<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactoryRequest;
use App\Http\Requests\UpdateFactoryRequest;
use App\Models\Factory;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factories = Factory::paginate(10);
        return view('factories.index', compact('factories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('factories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFactoryRequest $request)
    {
        Factory::create($request->validated());
        return redirect()->route('factories.index', ['success' => 'Factory created successfully.']);
        //return redirect()->route('factories.index')->with('success', 'Factory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factory $factory)
    {
        return view('factories.show', compact('factory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factory $factory)
    {
        return view('factories.edit', compact('factory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactoryRequest $request, Factory $factory)
    {
        $factory->update($request->validated());
        return redirect()->route('factories.index', ['success' => 'Factory updated successfully.']);
        //return redirect()->route('factories.index')->with('success', 'Factory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factory $factory)
    {
        $factory->delete();
        return redirect()->route('factories.index', ['success' => 'Factory deleted successfully.']);
        //return redirect()->route('factories.index')->with('success', 'Factory deleted successfully.');
    }

    public function trashed()
    {
        $deletedFactories = Factory::onlyTrashed()->paginate(10);
        return view('factories.trashed', compact('deletedFactories'));
    }

    /**
     * Restore a soft deleted factory.
     */
    public function restore($id)
    {
        $factory = Factory::onlyTrashed()->findOrFail($id);
        $factory->restore();
        return redirect()->route('factories.trashed', ['success' => 'Factory restored successfully.']);
        //return redirect()->route('factories.trashed')->with('success', 'Factory restored successfully.');
    }

    /**
     * Permanently delete a factory.
     */
    public function forceDelete($id)
    {
        $factory = Factory::onlyTrashed()->findOrFail($id);
        $factory->forceDelete();
        return redirect()->route('factories.trashed', ['success' => 'Factory permanently deleted.']);
        //return redirect()->route('factories.trashed')->with('success', 'Factory permanently deleted.');
    }
}
