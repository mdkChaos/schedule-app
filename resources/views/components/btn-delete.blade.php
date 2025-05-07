@props(['route'])

<form action="{{ $route }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <x-button class="btn-outline-danger">
        <i class="bi bi-trash"></i> {{ __('message.delete') }}
    </x-button>
</form>
