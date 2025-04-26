@extends('layouts.admin')

@section('title', __('message.delete_position'))

@section('content')
    <div class="container py-4">
        <x-page-header :title="__('message.delete_position')" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> {{ __('message.back') }}
                </a>
            </x-slot:left>
        </x-page-header>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
                    @forelse ($positions as $position)
                        <tr>
                            <td>{{ $position->id }}</td>
                            <td>{{ $position->name }}</td>
                            <td>{{ $position->deleted_at->format('d.m.Y H:i') }}</td>
                            <td class="text-end">
                                <form action="{{ route('positions.restore', $position->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success me-2">
                                        <i class="bi bi-arrow-clockwise"></i> {{ __('message.restore') }}
                                    </button>
                                </form>
                                <form action="{{ route('positions.forceDelete', $position->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to permanently delete this?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="bi bi-x-circle"></i> {{ __('message.delete_permanently') }}
                                    </button>
                                </form>
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
        <div class="d-flex justify-content-center mt-4">
            {{ $positions->links() }}
        </div>
    </div>
@endsection
