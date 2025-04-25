@extends('layouts.admin')

@section('title', 'Редагувати цех')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Редагувати цех'" :iconClass="'bi bi-pencil-square text-success'">
            <x-slot:left>
                <a href="{{ route('workshops.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> До списку
                </a>
            </x-slot:left>
        </x-page-header>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('workshops.update', $workshop) }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="factory_id" class="form-label fw-semibold">Фабрика</label>
                                <select name="factory_id" id="factory_id"
                                    class="form-select @error('factory_id') is-invalid @enderror" required>
                                    <option value="" disabled>Оберіть фабрику...</option>
                                    @foreach ($factories as $factory)
                                        <option value="{{ $factory->id }}"
                                            {{ old('factory_id', $workshop->factory_id) == $factory->id ? 'selected' : '' }}>
                                            {{ $factory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('factory_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Назва цеху</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $workshop->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex justify-content-end gap-2">
                                <a href="{{ route('workshops.index') }}" class="btn btn-outline-secondary">
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
