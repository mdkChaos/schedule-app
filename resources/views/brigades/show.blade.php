@extends('layouts.admin')

@section('title', $brigade->name)

@section('content')
    <div class="container py-4">
        <x-page-header :title="$brigade->name" :iconClass="'bi bi-people text-secondary'">
            <x-slot:left>
                <a href="{{ route('brigades.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left"></i> До списку
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('brigades.edit', $brigade) }}" class="btn btn-outline-success me-2">
                    <i class="bi bi-pencil"></i> Редагувати
                </a>
                <form action="{{ route('brigades.destroy', $brigade) }}" method="POST" class="d-inline">
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
                            <i class="bi bi-info-circle"></i> Деталі бригади
                        </h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $brigade->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>Назва:</strong> {{ $brigade->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Створено:</strong> {{ $brigade->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Оновлено:</strong> {{ $brigade->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
