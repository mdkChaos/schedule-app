@extends('layouts.admin')

@section('title', 'Редагувати відділ')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Редагувати відділ'" :iconClass="'bi bi-pencil-square text-warning'">
            <x-slot:left>
                <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> До списку
                </a>
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('departments.update', $department) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="workshop_id" class="form-label fw-semibold">Цех</label>
                                <select name="workshop_id" id="workshop_id"
                                    class="form-select @error('workshop_id') is-invalid @enderror" required>
                                    <option value="" disabled>Оберіть цех...</option>
                                    @foreach ($workshops as $workshop)
                                        <option value="{{ $workshop->id }}"
                                            {{ old('workshop_id', $department->workshop_id) == $workshop->id ? 'selected' : '' }}>
                                            {{ $workshop->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('workshop_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Назва відділу</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $department->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg"></i> Скасувати
                                </a>
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="bi bi-save"></i> Зберегти зміни
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
