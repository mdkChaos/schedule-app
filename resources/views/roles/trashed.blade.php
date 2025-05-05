@extends('layouts.admin')

@section('title', __('message.trashed'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <x-btn-back :route="route('roles.index')" />
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
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->deleted_at->format('d.m.Y H:i') }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">

                                <x-btn-restore :route="route('roles.restore', $role)" />
                                <x-btn-force-delete :route="route('roles.forceDelete', $role)" />

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
        {{ $roles->links() }}
    </div>
@endsection
