@props(['route'])

<form action="{{ $route }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-outline-success me-2">
        <i class="bi bi-arrow-clockwise"></i> {{ __('message.restore') }}
    </button>
</form>
