<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alfred Nutile | @yield('title')</title>
    <meta name="description" content="Alfred Nutile - Leader, PHP, JavaScript, Laravel, VueJS" />
    <meta name="keywords" content="leadership, laravel, javascript, vuejs, php" />
    <meta name="author" content="Alfred Nutile" />
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <!-- Livewire -->
    @livewireStyles
</head>

<body>
    <div id="app">
        @include("misc.nav")

        <main class="py-4">
            <div class="container-fluid">
                <div class="d-flex justify-content-center">
                    @include('misc.messages')
                </div>
            </div>
            @if(isset($slot))
            {{ $slot }}
            @endif
            @yield('content')
        </main>

        @livewireScripts

        <script src="{{ asset('js/app.js') }}" defer></script>

    </div>
</body>

</html>