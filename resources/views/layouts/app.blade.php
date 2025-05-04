<!DOCTYPE html>
<html lang="uk" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Schedule App')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100" style="font-family: 'Nunito', Arial, sans-serif;">
    {{-- Навігація --}}
    <x-navbar :navStyle="'navbar-light bg-white shadow-sm'" :logoUrl="route('index')" :logoText="'Schedule App'" :logoStyle="'bi bi-calendar2-week'" :itemUrl="route('admin.dashboard')"
        :itemStyle="'btn-outline-dark'" :itemText="'Admin'" />

    {{-- Основний вміст --}}
    <main class="flex-grow-1 py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} Schedule App. {{ __('message.all_rights_reserved') }}.
        </div>
    </footer>

    {{-- Scripts --}}
    <x-auto-close-alert />

    @stack('scripts')
</body>

</html>
