<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Atendimento Pro</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.dataTables.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel-2/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mdi/css/materialdesignicons.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon-16x16.png') }}">





</head>

<body class="sidebar-icon-only @yield('classname')">
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Plugin js for this page -->
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/date-eu.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="https://unpkg.com/htmx.org@1.9.11"></script>
    <script>
        setTimeout(() => {
            $("#alert").removeClass("fadeInDown");
            $("#alert").addClass("fadeOutUp");
            setTimeout(() => {
                $("#alert").remove();
            }, 800);
        }, 3000);
    </script>

    @yield('script')


</body>

</html>
