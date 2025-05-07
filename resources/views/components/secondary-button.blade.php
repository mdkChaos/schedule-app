<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-outline-secondary fw-semibold px-4 py-2']) }}>
    {{ $slot }}
</button>
