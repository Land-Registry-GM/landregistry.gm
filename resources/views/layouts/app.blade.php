<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Land Registry - The Gambia'))</title>
    <meta name="description" content="@yield('description', 'Modern land registry system for The Gambia - Secure, transparent, and efficient property registration and management.')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <!-- Debug: Check if CSS is loading -->
    <style>
        body { background-color: #f5f5f5 !important; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
    </style>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Minimal JavaScript -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        // Configure axios for Laravel
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    </script>

    <!-- Page-specific styles -->
    @stack('styles')
</head>
<body>
    @include('layouts.partials.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    @stack('scripts')
</body>
</html>
