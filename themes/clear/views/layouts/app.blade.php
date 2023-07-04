<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @isset($title)
        <title>{{ config('app.name', 'Paymenter') . ' - ' . $title }}</title>
    @else
        <title>{{ config('app.name', 'Paymenter') }}</title>
    @endisset

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite(['resources/css/app.css'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta content="{{ config('settings::seo_title') }}" property="og:title">
    <meta content="{{ config('settings::seo_description') }}" property="og:description">
    <meta content='{{ config('settings::seo_image') }}' property="og:image">
    <link type="application/json+oembed"
        href="{{ url('/') }}/manifest.json?title={{ urldecode('Paymenter') }}&author_url={{ urldecode('https://discord.gg/xB4UUT3XQg') }}&author_name=demo" />
    <meta name="twitter:card" content="@if (config('settings::seo_twitter_card')) summary_large_image @endif">
    <meta name="theme-color" content="#5270FD">
</head>

<body class="font-sans antialiased bg-white dark:bg-gray-900">
    <div id="app" class="min-h-screen dark:text-white">
        @include('layouts.navigation')
        <!-- Page Content -->
        <main class="grow">
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>
</body>

</html>