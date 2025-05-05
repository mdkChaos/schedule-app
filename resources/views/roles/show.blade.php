@extends('layouts.admin')

@section('title', $role->name)

@section('content')
    <div class="container">
        <x-page-header :title="$role->name" :iconClass="'bi bi-building text-primary'">
            <x-slot:left>
                <x-btn-back :route="route('roles.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-edit :route="route('roles.edit', $role)" />
                <x-btn-delete :route="route('roles.destroy', $role)" />
            </x-slot:right>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-secondary text-center fw-semibold">
                            <i class="bi bi-info-circle"></i> {{ __('message.details') }}
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $role->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.role') }}:</strong> {{ $role->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.created') }}:</strong>
                                {{ $role->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.updated') }}:</strong>
                                {{ $role->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
