@extends('layouts.admin')

@section('title', $department->name)

@section('content')
    <div class="container py-4">
        <x-page-header :title="$department->name" :iconClass="'bi bi-diagram-3 text-warning'">
            <x-slot:left>
                <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left"></i> До списку
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('departments.edit', $department) }}" class="btn btn-outline-warning me-2">
                    <i class="bi bi-pencil"></i> Редагувати
                </a>
                <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i> Видалити
                    </button>
                </form>
            </x-slot:right>
        </x-page-header>

        {{-- Деталі відділу --}}
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-secondary fw-semibold">
                            <i class="bi bi-info-circle"></i> Деталі відділу
                        </h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $department->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>Назва:</strong> {{ $department->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Цех:</strong> {{ $department->workshop->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>Фабрика:</strong> {{ $department->workshop->factory->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>Створено:</strong> {{ $department->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Оновлено:</strong> {{ $department->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                        <a href="{{ route('departments.index') }}" class="btn btn-primary w-100">
                            <i class="bi bi-list"></i> До списку відділів
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
