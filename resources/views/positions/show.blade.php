@extends('layouts.admin')

@section('title', $position->name)

@section('content')
    <div class="container py-4">
        <x-page-header :title="$position->name" :iconClass="'bi bi-person-vcard text-dark'">
            <x-slot:left>
                <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left"></i> {{ __('message.back') }}
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('positions.edit', $position) }}" class="btn btn-outline-success me-2">
                    <i class="bi bi-pencil"></i> {{ __('message.edit') }}
                </a>
                <form action="{{ route('positions.destroy', $position) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i> {{ __('message.delete') }}
                    </button>
                </form>
            </x-slot:right>
        </x-page-header>

        {{-- Деталі відділу --}}
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-secondary fw-semibold">
                            <i class="bi bi-info-circle"></i> {{ __('message.details') }}
                        </h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $position->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.name') }}:</strong> {{ $position->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.created') }}:</strong>
                                {{ $position->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.updated') }}:</strong>
                                {{ $position->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
