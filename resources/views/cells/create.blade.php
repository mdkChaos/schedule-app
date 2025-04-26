@extends('layouts.admin')

@section('title', 'Create Cell')
@section('content')
    <div class="container py-4">
        <x-page-header :title="'Create Cell'" :iconClass="'bi bi-plus-circle text-info'">
            <x-slot:left>
                <a href="{{ route('cells.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to list
                </a>
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('cells.store') }}" method="POST" autocomplete="off">
                            @csrf

                            <div class="mb-3">
                                <label for="department_id" class="form-label fw-semibold">Department</label>
                                <select name="department_id" id="department_id"
                                    class="form-select @error('department_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Choose department...</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Cell Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('cells.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-check-circle"></i> Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
