@extends('layouts.admin')

@section('title', __('message.brigades'))

@section('content')
    <div class="container py-4">
        <x-page-header :title="__('message.brigades')" :iconClass="'bi bi-people text-secondary'">
            <x-slot:left>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> {{ __('message.admin_panel') }}
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('brigades.create') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-plus-lg"></i> {{ __('message.add') }}
                </a>
                <a href="{{ route('brigades.trashed') }}" class="btn btn-outline-danger">
                    <i class="bi bi-trash3"></i> {{ __('message.trashed') }}
                </a>
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        {{-- Table --}}
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brigades as $brigade)
                        <tr>
                            <td>{{ $brigade->id }}</td>
                            <td>{{ $brigade->name }}</td>

                            {{-- Actions --}}
                            <x-resource-actions :showRoute="route('brigades.show', $brigade)" :editRoute="route('brigades.edit', $brigade)" :deleteRoute="route('brigades.destroy', $brigade)" />
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $brigades->links() }}
        </div>
    </div>
@endsection
