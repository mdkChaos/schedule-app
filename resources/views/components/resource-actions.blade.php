@props(['showRoute', 'editRoute', 'deleteRoute'])

<td class="text-end">
    <a href="{{ $showRoute }}" class="btn btn-outline-secondary btn-sm me-1">
        <i class="bi bi-eye"></i> {{ __('message.view') }}
    </a>
    <a href="{{ $editRoute }}" class="btn btn-outline-success btn-sm me-1">
        <i class="bi bi-pencil"></i> {{ __('message.edit') }}
    </a>
    <form action="{{ $deleteRoute }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-trash"></i> {{ __('message.delete') }}
        </button>
    </form>
</td>
