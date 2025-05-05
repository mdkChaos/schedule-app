@extends('layouts.admin')

@section('title', $brigade->name)

@section('content')
    <div class="container">
        <x-page-header :title="$brigade->name" :iconClass="'bi bi-people text-secondary'">
            <x-slot:left>
                <x-btn-back :route="route('brigades.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-edit :route="route('brigades.edit', $brigade)" />
                <x-btn-delete :route="route('brigades.destroy', $brigade)" />
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
                                <strong>ID:</strong> {{ $brigade->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.brigade') }}:</strong> {{ $brigade->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.created') }}:</strong>
                                {{ $brigade->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.deleted') }}:</strong>
                                {{ $brigade->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
