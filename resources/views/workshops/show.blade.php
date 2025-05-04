@extends('layouts.admin')

@section('title', $workshop->name)

@section('content')
    <div class="container">
        <x-page-header :title="$workshop->name" :iconClass="'bi bi-gear-wide-connected text-success'">
            <x-slot:left>
                <x-btn-back :route="route('workshops.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-edit :route="route('workshops.edit', $workshop)" />
                <x-btn-delete :route="route('workshops.destroy', $workshop)" />
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
                                <strong>ID:</strong> {{ $workshop->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.workshop') }}:</strong> {{ $workshop->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.factory') }}:</strong> {{ $workshop->factory->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.created') }}:</strong>
                                {{ $workshop->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>{{ __('message.updated') }}:</strong>
                                {{ $workshop->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
