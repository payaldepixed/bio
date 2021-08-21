<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jcolor-picker.min.css') }}" rel="stylesheet" />
    <!-- include libraries(jQuery, bootstrap) -->
        {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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
    <script src="{{ asset('js/jcolor-picker.min.js') }}"></script>
    <script>




    $(document).ready(function() {
        // $('#primary-text-color').jColorPicker();
        // $('#primary-background').jColorPicker();
        // $('#profile-picture-border-color').jColorPicker();
        // $('#button-color').jColorPicker();
        // $('#card-color').jColorPicker();
        // $('#text-color').jColorPicker();
        // $('#card-border-color').jColorPicker();
        // $('#button-text-color').jColorPicker();
        // $('#button-border-color').jColorPicker();
        if($('#summernote').length){
            $('#summernote').summernote({
                placeholder: 'Add text here...',
                height: 100,
                toolbar: [
                    // ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    // ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['table', ['table']],
                    ['insert', ['link']],
                    // ['view', ['fullscreen', 'codeview', 'help']]
                    ]
            });
        }

    });
  </script>
    @yield('js_after')
</body>

</html>
