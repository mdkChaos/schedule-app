@props(['icon', 'iconColor', 'title', 'text', 'route'])

<div class="col-md-3">
    <div class="card border-0 shadow-lg h-100 hover-zoom">
        <div class="card-body text-center">
            <span class="display-5 text-{{ $iconColor }}"><i class="{{ $icon }}"></i></span>
            <h5 class="card-title fw-semibold mt-3">{{ $title }}</h5>
            <p class="card-text text-muted">{{ $text }}</p>
            <a href="{{ $route }}" class="btn btn-outline-primary rounded-pill px-4">{{ __('message.go_to') }}</a>
        </div>
    </div>
</div>
