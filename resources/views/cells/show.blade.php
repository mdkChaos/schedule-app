@extends('layouts.admin')

@section('title', $cell->name)

@section('content')
    <div class="container">
        <x-page-header :title="$cell->name" :iconClass="'bi bi-grid text-info'">
            <x-slot:left>
                <x-btn-back :route="route('cells.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-edit :route="route('cells.edit', $cell)" />
                <x-btn-delete :route="route('cells.destroy', $cell)" />
            </x-slot:right>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-secondary text-center fw-semibold">
                            <i class="bi bi-info-circle"></i> {{ __('message.details') }}
                        </h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $cell->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.cell') }}:</strong> {{ $cell->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.department') }}:</strong> {{ $cell->department->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.workshop') }}:</strong>
                                {{ $cell->department->workshop->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.factory') }}:</strong>
                                {{ $cell->department->workshop->factory->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.created') }}:</strong> {{ $cell->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.updated') }}:</strong> {{ $cell->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
