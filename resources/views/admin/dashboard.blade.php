@extends('layouts.admin')

@section('title', __('message.admin_panel'))

@section('content')
    <div class="py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">{{ __('message.admin_panel') }}</h1>
        </div>
        <div class="row justify-content-center g-4">

            <x-dashboard-card icon="bi bi-building" iconColor="primary" :title="__('message.factories')" :text="__('message.factories_management')"
                :route="route('factories.index')" />

            <x-dashboard-card icon="bi bi-gear-wide-connected" iconColor="success" :title="__('message.workshops')" :text="__('message.workshops_management')"
                :route="route('workshops.index')" />

            <x-dashboard-card icon="bi bi-diagram-3" iconColor="warning" :title="__('message.departments')" :text="__('message.departments_management')"
                :route="route('departments.index')" />

            <x-dashboard-card icon="bi bi-grid" iconColor="info" :title="__('message.cells')" :text="__('message.cells_management')" :route="route('cells.index')" />

            <x-dashboard-card icon="bi bi-people" iconColor="secondary" :title="__('message.brigades')" :text="__('message.brigades_management')"
                :route="route('brigades.index')" />

            <x-dashboard-card icon="bi bi-person-vcard" iconColor="dark" :title="__('message.positions')" :text="__('message.positions_management')"
                :route="route('positions.index')" />

            <x-dashboard-card icon="bi bi-calendar" iconColor="danger" :title="__('message.shifts')" :text="__('message.shifts_management')"
                :route="route('shifts.index')" />

            <x-dashboard-card icon="bi bi-shield-lock" iconColor="primary" :title="__('message.roles')" :text="__('message.roles_management')"
                :route="route('roles.index')" />
            {{-- <x-dashboard-card icon="bi bi-person-badge" iconColor="danger" :title="__('message.employees')" :text="__('message.employees_management')"
                :route="route('employees.index')" /> --}}

            <div class="col-md-3">
                <div class="card border-0 shadow-lg h-100 hover-zoom">
                    <div class="card-body text-center">
                        <span class="display-5 text-danger"><i class="bi bi-person-badge"></i></span>
                        <h5 class="card-title fw-semibold mt-3">{{ __('message.employees') }}</h5>
                        <p class="card-text text-muted">{{ __('message.employees_management') }}</p>
                        <a href="#" class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .hover-zoom:hover {
            transform: translateY(-8px) scale(1.03);
            transition: 0.2s;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15) !important;
        }
    </style>
@endsection
