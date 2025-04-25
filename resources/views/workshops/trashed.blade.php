{{-- filepath: /home/andrii/Projects/schedule-app/resources/views/workshops/trashed.blade.php --}}
@extends('layouts.admin')

@section('title', 'Видалені цехи')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Видалені цехи'" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <a href="{{ route('workshops.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> До списку цехів
                </a>
            </x-slot:left>
        </x-page-header>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Назва цеху</th>
                        <th scope="col">Фабрика</th>
                        <th scope="col">Видалено</th>
                        <th scope="col" class="text-end">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedWorkshops as $workshop)
                        <tr>
                            <td>{{ $workshop->id }}</td>
                            <td>{{ $workshop->name }}</td>
                            <td>{{ $workshop->factory->name ?? '—' }}</td>
                            <td>{{ $workshop->deleted_at->format('d.m.Y H:i') }}</td>
                            <td class="text-end">
                                <form action="{{ route('workshops.restore', $workshop->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm me-1">
                                        <i class="bi bi-arrow-clockwise"></i> Відновити
                                    </button>
                                </form>
                                <form action="{{ route('workshops.forceDelete', $workshop->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Ви впевнені, що хочете остаточно видалити цей цех?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-circle"></i> Видалити назавжди
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Видалених цехів не знайдено.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $deletedWorkshops->links() }}
        </div>
    </div>
@endsection
