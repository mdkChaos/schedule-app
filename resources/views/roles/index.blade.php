@extends('layouts.admin')

@section('title', __('message.roles'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.roles')" :iconClass="'bi bi-shield-lock text-primary'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('roles.create')" />
                <x-btn-trashed :route="route('roles.trashed')" />
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
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-view :route="route('roles.show', $role)" />
                                <x-btn-edit :route="route('roles.edit', $role)" />
                                <x-btn-delete :route="route('roles.destroy', $role)" />
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
        {{ $roles->links() }}
    </div>
@endsection
