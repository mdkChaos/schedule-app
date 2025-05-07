<x-admin-layout :title="__('message.employees')">
    <div class="container">
        <x-page-header :title="$employee->employee_code" :iconClass="'bi bi-person-badge text-danger'">
            <x-slot:left>
                <x-btn-link class="btn-outline-secondary" :icon="'bi-arrow-left'" :message="__('message.back')" :route="route('employees.index')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-link class="btn-outline-success" :icon="'bi-pencil'" :message="__('message.edit')" :route="route('employees.edit', $employee)" />
                <x-btn-delete :route="route('employees.destroy', $employee)" />
            </x-slot:right>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-secondary text-center fw-semibold">
                            <i class="bi bi-info-circle"></i> {{ __('message.details') }}
                        </h5>
                        <dl class="mb-0">
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">ID</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->id }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.employee_code') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->employee_code }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.first_name') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->name }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.surname') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->surname }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.email') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->email }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.role') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->role?->name }}</dd>
                            </div>
                            <div class="row align-items-center border-bottom py-2">
                                <dt class="col-sm-4">{{ __('message.created') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->created_at->format('d.m.Y H:i') }}</dd>
                            </div>
                            <div class="row align-items-center py-2">
                                <dt class="col-sm-4">{{ __('message.updated') }}</dt>
                                <dd class="col-sm-8 mb-0">{{ $employee->updated_at->format('d.m.Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
