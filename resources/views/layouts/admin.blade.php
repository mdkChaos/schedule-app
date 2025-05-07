@props(['title'])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-bs-theme="light">

{{-- Head --}}
<x-head :title="$title ?? __('message.admin_panel')" />

<body class="d-flex flex-column min-vh-100" style="font-family: 'Nunito', Arial, sans-serif;">
    {{-- Navigation --}}
    <x-navbar :navStyle="'navbar-dark bg-dark'" :logoUrl="route('admin.dashboard')" :logoText="__('message.admin_panel')" :logoStyle="'bi bi-speedometer2'" :itemUrl="route('index')"
        :itemStyle="'btn-outline-light'" :itemText="__('message.schedule')" />

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
