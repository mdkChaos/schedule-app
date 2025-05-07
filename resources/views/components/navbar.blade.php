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
                    <x-language-switch />
                </li>
                @guest
                    <li class="nav-item ms-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-box-arrow-in-right"></i> {{ __('message.login') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item ms-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-box-arrow-right"></i> {{ __('message.logout') }}
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
