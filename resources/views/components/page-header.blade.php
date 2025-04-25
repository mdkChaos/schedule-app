<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex gap-2">
        {{-- Лівий блок (наприклад, кнопки навігації) --}}
        {{ $left ?? '' }}
    </div>
    <h1 class="mb-0 fw-bold">
        <span class="{{ $iconClass }}"></span> {{ $title }}
    </h1>
    <div>
        {{-- Правий блок (наприклад, кнопка дії) --}}
        {{ $right ?? '' }}
    </div>
</div>
