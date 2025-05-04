@extends('layouts.admin')

@section('title', __('message.factories'))

@section('content')
    <div class="container py-4">
        <x-page-header :title="__('message.factories')" :iconClass="'bi bi-building text-primary'">
            <x-slot:left>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> {{ __('message.admin_panel') }}
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('factories.create') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-plus-lg"></i> {{ __('message.add') }}
                </a>
                <a href="{{ route('factories.trashed') }}" class="btn btn-outline-danger">
                    <i class="bi bi-trash3"></i> {{ __('message.trashed') }}
                </a>
            </x-slot:right>
        </x-page-header>

        <x-message-alert />

        {{-- Таблиця --}}
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
                    @forelse ($factories as $factory)
                        <tr>
                            <td>{{ $factory->id }}</td>
                            <td>{{ $factory->name }}</td>

                            {{-- Action Buttons --}}
                            <x-resource-actions :showRoute="route('factories.show', $factory)" :editRoute="route('factories.edit', $factory)" :deleteRoute="route('factories.destroy', $factory)" />

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">{{ __('message.not_found') }}</td>
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
