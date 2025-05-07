@props(['route'])

<form action="{{ $route }}" method="POST" class="d-inline">
    @csrf
    <x-button class="btn-outline-success me-2">
        <i class="bi bi-arrow-clockwise"></i> {{ __('message.restore') }}
    </x-button>
</form>
