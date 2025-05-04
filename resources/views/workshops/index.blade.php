@extends('layouts.admin')

@section('title', __('message.workshops'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.workshops')" :iconClass="'bi bi-gear-wide-connected text-success'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('workshops.create')" />
                <x-btn-trashed :route="route('workshops.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.workshop') }}</th>
                        <th scope="col">{{ __('message.factory') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($workshops as $workshop)
                        <tr>
                            <td>{{ $workshop->id }}</td>
                            <td>{{ $workshop->name }}</td>
                            <td>{{ $workshop->factory->name ?? '—' }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-view :route="route('workshops.show', $workshop)" />
                                <x-btn-edit :route="route('workshops.edit', $workshop)" />
                                <x-btn-delete :route="route('workshops.destroy', $workshop)" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $workshops->links() }}
        </div>
    </div>
@endsection
