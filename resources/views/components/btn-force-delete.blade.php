@props(['route'])

<form action="{{ $route }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <x-button class="btn-outline-danger">
        <i class="bi bi-x-circle"></i> {{ __('message.delete_permanently') }}
    </x-button>
</form>
