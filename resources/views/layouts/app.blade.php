<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @yield('meta')
    <!-- SEO -->
    <title>
        @yield('title', config('app.name'))
        @hasSection('title')
        - {{ config('app.name') }}
        @endif
    </title>

    @yield('css_before')
    <!-- CSS -->
    <link href="{{ asset('css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="https://fontawesome.com/v4.7/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @yield('css_after')
</head>

<body class="antialiased">
    <div class="wrapper">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            @include('layouts.partials.mainnav')
        </aside>
        <div class="page-wrapper">
            @yield('content')

            <footer class="footer footer-transparent d-print-none">
                @include('layouts.partials.mainfooter')
            </footer>
        </div>

    </div>
    <!-- JS -->
    <script src="{{ asset('js/tabler.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js_after')
</body>

</html>
