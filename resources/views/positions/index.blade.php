@extends('layouts.admin')

@section('title', __('message.position'))

@section('content')
    <div class="container py-4">
        <x-page-header :title="__('message.position')" :iconClass="'bi bi-person-vcard text-dark'">
            <x-slot:left>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> {{ __('message.admin_panel') }}
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('positions.create') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-plus-lg"></i> {{ __('message.add') }}
                </a>
                <a href="{{ route('positions.trashed') }}" class="btn btn-outline-danger">
                    <i class="bi bi-trash3"></i> {{ __('message.trashed') }}
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
                        <th scope="col">{{ __('message.position') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($positions as $position)
                        <tr>
                            <td>{{ $position->id }}</td>
                            <td>{{ $position->name }}</td>
                            <td class="text-end">
                                <a href="{{ route('positions.show', $position) }}"
                                    class="btn btn-outline-secondary btn-sm me-1">
                                    <i class="bi bi-eye"></i> {{ __('message.view') }}
                                </a>
                                <a href="{{ route('positions.edit', $position) }}"
                                    class="btn btn-outline-success btn-sm me-1">
                                    <i class="bi bi-pencil"></i> {{ __('message.edit') }}
                                </a>
                                <form action="{{ route('positions.destroy', $position) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> {{ __('message.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Пагінація --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $positions->links() }}
        </div>
    </div>
@endsection
