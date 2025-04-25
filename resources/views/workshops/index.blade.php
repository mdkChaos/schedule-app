@extends('layouts.admin')

@section('title', 'Workshops')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Workshops'" :iconClass="'bi bi-gear-wide-connected text-success'">
            <x-slot:left>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Admin Panel
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('workshops.create') }}" class="btn btn-primary px-4">
                    <i class="bi bi-plus-lg"></i> Add Workshop
                </a>
                <a href="{{ route('workshops.trashed') }}" class="btn btn-outline-danger">
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
                        <th scope="col">Workshop</th>
                        <th scope="col">Factory</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($workshops as $workshop)
                        <tr>
                            <td>{{ $workshop->id }}</td>
                            <td>{{ $workshop->name }}</td>
                            <td>{{ $workshop->factory->name ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('workshops.show', $workshop) }}"
                                    class="btn btn-outline-secondary btn-sm me-1">
                                    <i class="bi bi-eye"></i> Переглянути
                                </a>
                                <a href="{{ route('workshops.edit', $workshop) }}"
                                    class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Редагувати
                                </a>
                                <form action="{{ route('workshops.destroy', $workshop) }}" method="POST" class="d-inline">
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
                            <td colspan="4" class="text-center text-muted">No workshops found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Пагінація --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $workshops->links() }}
        </div>
    </div>
@endsection
