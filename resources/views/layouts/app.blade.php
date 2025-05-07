<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-bs-theme="light">

{{-- Head --}}
<x-head :title="__('message.work_schedule')" />

<body class="d-flex flex-column min-vh-100" style="font-family: 'Nunito', Arial, sans-serif;">
    {{-- Navigation --}}
    <x-navbar :navStyle="'navbar-light bg-white shadow-sm'" :logoUrl="route('index')" :logoText="__('message.work_schedule')" :logoStyle="'bi bi-calendar2-week'" :itemUrl="route('admin.dashboard')"
        :itemStyle="'btn-outline-dark'" :itemText="'Admin'" />

    {{-- Main --}}
    <x-main>
        {{ $slot }}
    </x-main>

    {{-- Footer --}}
    <x-footer />

    {{-- Bootstrap scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Scripts --}}
    <x-auto-close-alert />
</body>

</html>
