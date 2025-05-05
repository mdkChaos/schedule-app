@extends('layouts.admin')

@section('title', $position->name)

@section('content')
    <div class="container">
        <x-page-header :title="$position->name" :iconClass="'bi bi-person-vcard text-dark'">
            <x-slot:left>
                <x-btn-back :route="route('positions.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-edit :route="route('positions.edit', $position)" />
                <x-btn-delete :route="route('positions.destroy', $position)" />
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
