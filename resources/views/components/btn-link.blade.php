@props(['route', 'icon', 'message'])

<a {{ $attributes->merge([
    'class' => 'btn fw-semibold',
]) }}" href="{{ $route }}">
    <i class="bi {{ $icon }}"></i> {{ $message }}
</a>
