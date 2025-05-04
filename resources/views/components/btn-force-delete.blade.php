@props(['route'])

<form action="{{ $route }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger">
        <i class="bi bi-x-circle"></i> {{ __('message.delete_permanently') }}
    </button>
</form>
