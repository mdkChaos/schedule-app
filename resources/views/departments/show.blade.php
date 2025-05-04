@extends('layouts.admin')

@section('title', $department->name)

@section('content')
    <div class="container">
        <x-page-header :title="$department->name" :iconClass="'bi bi-diagram-3 text-warning'">
            <x-slot:left>
                <x-btn-back :route="route('departments.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-edit :route="route('departments.edit', $department)" />
                <x-btn-delete :route="route('departments.destroy', $department)" />
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
                                <strong>ID:</strong> {{ $department->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.department') }}:</strong> {{ $department->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.workshop') }}:</strong> {{ $department->workshop->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.factory') }}:</strong>
                                {{ $department->workshop->factory->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.created') }}:</strong>
                                {{ $department->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.updated') }}:</strong>
                                {{ $department->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
