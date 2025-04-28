@extends('layouts.admin')

@section('title', __('message.admin_panel'))

@section('content')
    <div class="py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">{{ __('message.admin_panel') }}</h1>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-lg h-100 hover-zoom">
                    <div class="card-body text-center">
                        <span class="display-5 text-primary"><i class="bi bi-building"></i></span>
                        <h5 class="card-title fw-semibold mt-3">{{ __('message.factories') }}</h5>
                        <p class="card-text text-muted">{{ __('message.factories_management') }}</p>
                        <a href="{{ route('factories.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg h-100 hover-zoom">
                    <div class="card-body text-center">
                        <span class="display-5 text-success"><i class="bi bi-gear-wide-connected"></i></span>
                        <h5 class="card-title fw-semibold mt-3">{{ __('message.workshops') }}</h5>
                        <p class="card-text text-muted">{{ __('message.workshops_management') }}</p>
                        <a href="{{ route('workshops.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg h-100 hover-zoom">
                    <div class="card-body text-center">
                        <span class="display-5 text-warning"><i class="bi bi-diagram-3"></i></span>
                        <h5 class="card-title fw-semibold mt-3">{{ __('message.departments') }}</h5>
                        <p class="card-text text-muted">{{ __('message.departments_management') }}</p>
                        <a href="{{ route('departments.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg h-100 hover-zoom">
                    <div class="card-body text-center">
                        <span class="display-5 text-info"><i class="bi bi-grid"></i></span>
                        <h5 class="card-title fw-semibold mt-3">{{ __('message.cells') }}</h5>
                        <p class="card-text text-muted">{{ __('message.cells_management') }}</p>
                        <a href="{{ route('cells.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg h-100 hover-zoom">
                    <div class="card-body text-center">
                        <span class="display-5 text-secondary"><i class="bi bi-people"></i></span>
                        <h5 class="card-title fw-semibold mt-3">{{ __('message.brigades') }}</h5>
                        <p class="card-text text-muted">{{ __('message.brigades_management') }}</p>
                        <a href="{{ route('brigades.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-lg h-100 hover-zoom">
                    <div class="card-body text-center">
                        <span class="display-5 text-dark"><i class="bi bi-person-vcard"></i></span>
                        <h5 class="card-title fw-semibold mt-3">{{ __('message.positions') }}</h5>
                        <p class="card-text text-muted">{{ __('message.positions_management') }}</p>
                        <a href="{{ route('positions.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
                    </div>
                </div>
            </div>
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
