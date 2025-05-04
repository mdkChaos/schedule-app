<div class="row mb-3">
    <div class="col text-start">
        {{ $left ?? '' }}
    </div>
    <div class="col text-center">
        <h1 class="mb-0 fw-bold">
            <span class="{{ $iconClass }}"></span> {{ $title }}
        </h1>
    </div>
    <div class="col text-end">
        {{ $right ?? '' }}
    </div>
</div>
