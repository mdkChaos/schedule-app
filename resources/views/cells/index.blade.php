{{-- filepath: /home/andrii/Projects/schedule-app/resources/views/cells/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Cells')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Cells'" :iconClass="'bi bi-grid text-info'">
            <x-slot:left>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Admin Panel
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('cells.create') }}" class="btn btn-primary px-4">
                    <i class="bi bi-plus-lg"></i> Add Cell
                </a>
                <a href="{{ route('cells.trashed') }}" class="btn btn-outline-danger">
                    <i class="bi bi-trash3"></i> Trashed
                </a>
            </x-slot:right>
        </x-page-header>

        {{-- Повідомлення --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Таблиця --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cell</th>
                        <th scope="col">Department</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cells as $cell)
                        <tr>
                            <td>{{ $cell->id }}</td>
                            <td>{{ $cell->name }}</td>
                            <td>{{ $cell->department->name ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('cells.show', $cell) }}" class="btn btn-outline-secondary btn-sm me-1">
                                    <i class="bi bi-eye"></i> Переглянути
                                </a>
                                <a href="{{ route('cells.edit', $cell) }}" class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Редагувати
                                </a>
                                <form action="{{ route('cells.destroy', $cell) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> Видалити
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No cells found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Пагінація --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $cells->links() }}
        </div>
    </div>
@endsection
