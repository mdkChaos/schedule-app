@extends('layouts.admin')

@section('title', __('message.brigades'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.brigades')" :iconClass="'bi bi-people text-secondary'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('brigades.create')" />
                <x-btn-trashed :route="route('brigades.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

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

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-view :route="route('brigades.show', $brigade)" />
                                <x-btn-edit :route="route('brigades.edit', $brigade)" />
                                <x-btn-delete :route="route('brigades.destroy', $brigade)" />
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

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $brigades->links() }}
        </div>
    </div>
@endsection
