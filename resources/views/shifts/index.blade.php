@extends('layouts.admin')

@section('title', __('message.shifts'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.shifts')" :iconClass="'bi bi-calendar text-danger'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('shifts.create')" />
                <x-btn-trashed :route="route('shifts.trashed')" />
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
                    @forelse ($shifts as $shift)
                        <tr>
                            <td>{{ $shift->id }}</td>
                            <td>{{ $shift->name }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-view :route="route('shifts.show', $shift)" />
                                <x-btn-edit :route="route('shifts.edit', $shift)" />
                                <x-btn-delete :route="route('shifts.destroy', $shift)" />
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
        {{ $shifts->links() }}
    </div>
@endsection
