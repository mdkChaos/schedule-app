@extends('layouts.admin')

@section('title', 'Видалені комірки')

@section('content')
    <div class="container py-4">
        <x-page-header :title="'Видалені комірки'" :iconClass="'bi bi-trash3 text-danger'">
            <x-slot:left>
                <a href="{{ route('cells.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> До списку комірок
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
                        <th scope="col">Назва комірки</th>
                        <th scope="col">Відділ</th>
                        <th scope="col">Видалено</th>
                        <th scope="col" class="text-end">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedCells as $cell)
                        <tr>
                            <td>{{ $cell->id }}</td>
                            <td>{{ $cell->name }}</td>
                            <td>{{ $cell->department->name ?? '—' }}</td>
                            <td>{{ $cell->deleted_at->format('d.m.Y H:i') }}</td>
                            <td class="text-end">
                                <form action="{{ route('cells.restore', $cell->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm me-1">
                                        <i class="bi bi-arrow-clockwise"></i> Відновити
                                    </button>
                                </form>
                                <form action="{{ route('cells.forceDelete', $cell->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Ви впевнені, що хочете остаточно видалити цю комірку?')">
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
                            <td colspan="6" class="text-center text-muted">Видалених комірок не знайдено.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $deletedCells->links() }}
        </div>
    </div>
@endsection
