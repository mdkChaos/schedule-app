<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Адмін-панель')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

</head>

<body class="d-flex flex-column min-vh-100" style="font-family: 'Nunito', Arial, sans-serif;">
    <x-navbar :navStyle="'navbar-dark bg-dark'" :logoUrl="route('admin.dashboard')" :logoText="'Admin Panel'" :logoStyle="'bi bi-speedometer2'" :itemUrl="route('index')"
        :itemStyle="'btn-outline-light'" :itemText="'Schedule'" />

    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} Schedule App. Всі права захищено.
        </div>
    </footer>

    {{-- Bootstrap scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
