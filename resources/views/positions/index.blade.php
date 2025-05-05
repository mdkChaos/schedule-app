@extends('layouts.admin')

@section('title', __('message.position'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.position')" :iconClass="'bi bi-person-vcard text-dark'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('positions.create')" />
                <x-btn-trashed :route="route('positions.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

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
                                <x-btn-view :route="route('positions.show', $position)" />
                                <x-btn-edit :route="route('positions.edit', $position)" />
                                <x-btn-delete :route="route('positions.destroy', $position)" />
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
        {{ $positions->links() }}

    </div>
@endsection
