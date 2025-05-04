@extends('layouts.admin')

@section('title', __('message.trashed'))

@section('content')
    <div class="container py-4">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <a href="{{ route('factories.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> {{ __('message.back') }}
                </a>
            </x-slot:left>
        </x-page-header>

        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col">{{ __('message.deleted') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedFactories as $factory)
                        <tr>
                            <td>{{ $factory->id }}</td>
                            <td>{{ $factory->name }}</td>
                            <td>{{ $factory->deleted_at->format('d.m.Y H:i') }}</td>

                            {{-- Action Buttons --}}
                            <x-resource-actions-trashed :restoreRoute="route('factories.restore', $factory)" :forceDeleteRoute="route('factories.forceDelete', $factory)" />
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">{{ __('message.not_found') }}</td>
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
