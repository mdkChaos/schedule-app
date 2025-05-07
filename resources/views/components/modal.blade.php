@props(['name', 'show' => false, 'maxWidth' => 'lg'])

@php
    $maxWidthClass = match ($maxWidth) {
        'sm' => 'modal-sm',
        'lg' => 'modal-lg',
        'xl' => 'modal-xl',
        default => '',
    };
@endphp

<div x-data="{ show: @js($show) }" x-init="$watch('show', value => {
    if (value) {
        document.body.classList.add('modal-open');
    } else {
        document.body.classList.remove('modal-open');
    }
})"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null" x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false">
    <div class="modal fade" :class="{ show: show }" tabindex="-1" style="display: none;" x-show="show" x-transition>
        <div class="modal-dialog {{ $maxWidthClass }}">
            <div class="modal-content">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade" :class="{ show: show }" x-show="show" x-transition></div>
</div>
