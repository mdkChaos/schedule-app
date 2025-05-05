@extends('layouts.admin')

@section('title', __('message.departments'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.departments')" :iconClass="'bi bi-diagram-3 text-warning'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('departments.create')" />
                <x-btn-trashed :route="route('departments.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.department') }}</th>
                        <th scope="col">{{ __('message.workshop') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->workshop->name ?? '—' }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-view :route="route('departments.show', $department)" />
                                <x-btn-edit :route="route('departments.edit', $department)" />
                                <x-btn-delete :route="route('departments.destroy', $department)" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        {{ $departments->links() }}
    </div>
@endsection
