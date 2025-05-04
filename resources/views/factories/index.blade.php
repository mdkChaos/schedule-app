@extends('layouts.admin')

@section('title', 'Factories')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Factories'" :iconClass="'bi bi-building text-primary'">
            <x-slot:left>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Admin Panel
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('factories.create') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-plus-lg"></i> Add Factory
                </a>
                <a href="{{ route('factories.trashed') }}" class="btn btn-outline-danger">
                    <i class="bi bi-trash3"></i> Trashed
                </a>
            </x-slot:right>
        </x-page-header>

        {{-- Повідомлення --}}
        @if (request('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ request('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Таблиця --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Factory</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($factories as $factory)
                        <tr>
                            <td>{{ $factory->id }}</td>
                            <td>{{ $factory->name }}</td>
                            <td class="text-end">
                                <a href="{{ route('factories.show', $factory) }}"
                                    class="btn btn-outline-secondary btn-sm me-1">
                                    <i class="bi bi-eye"></i> Переглянути
                                </a>
                                <a href="{{ route('factories.edit', $factory) }}"
                                    class="btn btn-outline-success btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Редагувати
                                </a>
                                <form action="{{ route('factories.destroy', $factory) }}" method="POST" class="d-inline">
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
                            <td colspan="3" class="text-center text-muted">No factories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Пагінація --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $factories->links() }}
        </div>
    </div>
@endsection
