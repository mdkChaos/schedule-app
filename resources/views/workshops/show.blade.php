@extends('layouts.admin')

@section('title', $workshop->name)

@section('content')
    <div class="container py-4">
        <x-page-header :title="$workshop->name" :iconClass="'bi bi-gear-wide-connected text-success'">
            <x-slot:left>
                <a href="{{ route('workshops.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left"></i> До списку
                </a>
            </x-slot:left>
            <x-slot:right>
                <a href="{{ route('workshops.edit', $workshop) }}" class="btn btn-outline-warning me-2">
                    <i class="bi bi-pencil"></i> Редагувати
                </a>
                <form action="{{ route('workshops.destroy', $workshop) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Ви впевнені, що хочете видалити цей цех?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i> Видалити
                    </button>
                </form>
            </x-slot:right>
        </x-page-header>

        {{-- Деталі цеху --}}
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-secondary fw-semibold">
                            <i class="bi bi-info-circle"></i> Деталі цеху
                        </h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $workshop->id }}
                            </li>
                            <li class="list-group-item">
                                <strong>Назва:</strong> {{ $workshop->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Фабрика:</strong> {{ $workshop->factory->name ?? '—' }}
                            </li>
                            <li class="list-group-item">
                                <strong>Створено:</strong> {{ $workshop->created_at->format('d.m.Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Оновлено:</strong> {{ $workshop->updated_at->format('d.m.Y H:i') }}
                            </li>
                        </ul>
                        <a href="{{ route('workshops.index') }}" class="btn btn-primary w-100">
                            <i class="bi bi-list"></i> До списку цехів
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
