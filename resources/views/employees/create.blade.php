@extends('layouts.admin')

@section('title', __('message.create'))

@section('content')
    <div class="container">
        <x-page-header :title="__('message.create')" :iconClass="'bi bi-plus-circle text-primary'">
            <x-slot:left>
                <x-btn-back :route="route('employees.index')" />
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('employees.store') }}" method="POST" autocomplete="off">
                            @csrf

                            <div class="mb-3">
                                <label for="employee_code"
                                    class="form-label fw-semibold">{{ __('message.employee_code') }}</label>
                                <input type="text" name="employee_code" id="employee_code"
                                    class="form-control @error('employee_code') is-invalid @enderror"
                                    value="{{ old('employee_code') }}" required>
                                @error('employee_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">{{ __('message.first_name') }}</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="surname" class="form-label fw-semibold">{{ __('message.surname') }}</label>
                                <input type="text" name="surname" id="surname"
                                    class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}"
                                    required>
                                @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">{{ __('message.email') }}</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role_id" class="form-label fw-semibold">{{ __('message.role') }}</label>
                                <select name="role_id" id="role_id"
                                    class="form-select @error('role_id') is-invalid @enderror" required>
                                    <option value="">{{ __('message.choose') }}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <x-btn-cancel :route="route('employees.index')" />
                                <x-btn-create />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
