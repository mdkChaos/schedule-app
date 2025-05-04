@extends('layouts.admin')

@section('title', __('message.factories'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.factories')" :iconClass="'bi bi-building text-primary'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('factories.create')" />
                <x-btn-trashed :route="route('factories.trashed')" />
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
                    @forelse ($factories as $factory)
                        <tr>
                            <td>{{ $factory->id }}</td>
                            <td>{{ $factory->name }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-view :route="route('factories.show', $factory)" />
                                <x-btn-edit :route="route('factories.edit', $factory)" />
                                <x-btn-delete :route="route('factories.destroy', $factory)" />
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $factories->links() }}
        </div>
    </div>
@endsection
