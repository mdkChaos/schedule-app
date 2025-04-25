@extends('layouts.admin')

@section('title', 'Departments')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Departments'" :iconClass="'bi bi-diagram-3 text-warning'">
            <x-slot:left>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Admin Panel
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('departments.create') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-plus-lg"></i> Add Department
                </a>
                <a href="{{ route('departments.trashed') }}" class="btn btn-outline-danger">
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
                        <th scope="col">Department</th>
                        <th scope="col">Workshop</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->workshop->name ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('departments.show', $department) }}"
                                    class="btn btn-outline-secondary btn-sm me-1">
                                    <i class="bi bi-eye"></i> Переглянути
                                </a>
                                <a href="{{ route('departments.edit', $department) }}"
                                    class="btn btn-outline-success btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Редагувати
                                </a>
                                <form action="{{ route('departments.destroy', $department) }}" method="POST"
                                    class="d-inline">
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
                            <td colspan="5" class="text-center text-muted">No departments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Пагінація --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $departments->links() }}
        </div>
    </div>
@endsection
