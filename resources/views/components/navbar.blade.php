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
                <li class="nav-item d-flex align-items-center ms-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-info btn-sm dropdown-toggle d-flex align-items-center"
                            type="button" id="localeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-translate me-1"></i>
                            @if (app()->getLocale() == 'uk')
                                UA
                            @elseif(app()->getLocale() == 'en')
                                EN
                            @elseif(app()->getLocale() == 'pl')
                                PL
                            @endif
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="localeDropdown">
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'uk' ? 'active' : '' }}"
                                    href="{{ route('lang.switch', 'uk') }}">
                                    <span class="fi fi-ua me-2"></span> UA
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                                    href="{{ route('lang.switch', 'en') }}">
                                    <span class="fi fi-gb me-2"></span> EN
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'pl' ? 'active' : '' }}"
                                    href="{{ route('lang.switch', 'pl') }}">
                                    <span class="fi fi-pl me-2"></span> PL
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
