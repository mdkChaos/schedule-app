@extends('layouts.admin')

@section('title', __('message.trashed'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.trashed')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <x-btn-back :route="route('workshops.index')" />
            </x-slot:left>
        </x-page-header>

        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col">{{ __('message.factory') }}</th>
                        <th scope="col">{{ __('message.deleted') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedWorkshops as $workshop)
                        <tr>
                            <td>{{ $workshop->id }}</td>
                            <td>{{ $workshop->name }}</td>
                            <td>{{ $workshop->factory->name ?? '—' }}</td>
                            <td>{{ $workshop->deleted_at->format('d.m.Y H:i') }}</td>

                            {{-- Action Buttons --}}
                            <td class="text-end">
                                <x-btn-restore :route="route('workshops.restore', $workshop)" />
                                <x-btn-force-delete :route="route('workshops.forceDelete', $workshop)" />
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
        <div class="d-flex justify-content-center mt-4">
            {{ $deletedWorkshops->links() }}
        </div>
    </div>
@endsection
