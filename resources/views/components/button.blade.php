<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'btn fw-semibold',
]) }}>
    {{ $slot }}
</button>
