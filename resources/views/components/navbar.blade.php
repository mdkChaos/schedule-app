<nav class="navbar navbar-expand-lg {{ $navStyle }} border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ $logoUrl }}">
            <i class="{{ $logoStyle }} text-primary"></i> {{ $logoText }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ $itemUrl }}" class="btn {{ $itemStyle }} btn-sm ms-lg-2 my-2 my-lg-0">
                        {{ $itemText }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
