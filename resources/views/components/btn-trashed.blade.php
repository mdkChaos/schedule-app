@props(['route'])

<a href="{{ $route }}" class="btn btn-outline-danger me-1">
    <i class="bi bi-trash3"></i> {{ __('message.trashed') }}
</a>
