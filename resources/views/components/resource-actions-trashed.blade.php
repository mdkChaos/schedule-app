@props(['restoreRoute', 'forceDeleteRoute'])

<td class="text-end">
    <form action="{{ $restoreRoute }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-success me-2">
            <i class="bi bi-arrow-clockwise"></i> {{ __('message.restore') }}
        </button>
    </form>
    <form action="{{ $forceDeleteRoute }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">
            <i class="bi bi-x-circle"></i> {{ __('message.delete_permanently') }}
        </button>
    </form>
</td>
