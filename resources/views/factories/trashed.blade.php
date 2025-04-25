@extends('layouts.admin')

@section('title', 'Trashed Factories')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Trashed Factories'" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <a href="{{ route('factories.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to list
                </a>
            </x-slot:left>
        </x-page-header>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Factory Name</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedFactories as $factory)
                        <tr>
                            <td>{{ $factory->id }}</td>
                            <td>{{ $factory->name }}</td>
                            <td>{{ $factory->deleted_at->format('d.m.Y H:i') }}</td>
                            <td class="text-end">
                                <form action="{{ route('factories.restore', $factory->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success me-2">
                                        <i class="bi bi-arrow-clockwise"></i> Restore
                                    </button>
                                </form>
                                <form action="{{ route('factories.forceDelete', $factory->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to permanently delete this factory?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="bi bi-x-circle"></i> Delete permanently
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No trashed factories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $deletedFactories->links() }}
        </div>
    </div>
@endsection
