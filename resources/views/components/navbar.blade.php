<nav class="navbar navbar-expand-lg {{ $navStyle ?? 'navbar-light bg-white' }} border-bottom shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ $logoUrl ?? url('/') }}">
            @if (!empty($logoStyle))
                <i class="{{ $logoStyle }} text-primary me-2"></i>
            @endif
            {{ $logoText ?? config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-center">

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->login }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                            @if (!empty($itemUrl) && !empty($itemText))
                                <li>
                                    <a href="{{ $itemUrl }}" class="dropdown-item">
                                        {{ $itemText }}
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif

                            {{-- Сюди можна додати інші посилання, наприклад, на Профіль --}}
                            {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-person-badge me-1"></i> Мій профіль</a></li> --}}
                            {{-- <li><hr class="dropdown-divider"></li> --}}

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-1"></i>{{ __('message.logout') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item ms-lg-2">
                    <x-language-switch />
                </li>

                @guest
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-box-arrow-in-right me-1"></i>{{ __('message.login') }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
