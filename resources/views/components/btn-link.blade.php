@props(['route', 'icon', 'message'])

<a {{ $attributes->merge([
    'class' => 'btn fw-semibold me-1',
]) }}" href="{{ $route }}">
    <i class="bi {{ $icon }}"></i> {{ $message }}
</a>
