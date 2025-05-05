@extends('layouts.admin')

@section('title', __('message.employees'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.employees')" :iconClass="'bi bi-person-badge text-danger'">
            <x-slot:left>
                <x-btn-back :route="route('admin.dashboard')" />
            </x-slot:left>
            <x-slot:right>
                <x-btn-add :route="route('employees.create')" />
                <x-btn-trashed :route="route('employees.trashed')" />
            </x-slot:right>
        </x-page-header>

        {{-- Message --}}
        <x-message-alert />

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.employee_code') }}</th>
                        <th scope="col">{{ __('message.first_name') }}</th>
                        <th scope="col">{{ __('message.surname') }}</th>
                        <th scope="col">{{ __('message.email') }}</th>
                        <th scope="col">{{ __('message.role') }}</th>
                        <th scope="col" class="text-end">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->employee_code }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->surname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->role?->name }}</td>
                            <td class="text-end">
                                <x-btn-view :route="route('employees.show', $employee)" />
                                <x-btn-edit :route="route('employees.edit', $employee)" />
                                <x-btn-delete :route="route('employees.destroy', $employee)" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">{{ __('message.not_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        {{ $employees->links() }}
    </div>
@endsection
