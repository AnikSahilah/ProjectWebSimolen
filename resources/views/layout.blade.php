<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }}</title>

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @stack('style')

    <link rel="shortcut icon" type='image/x-icon' href="{{ asset('assets/img/favicon.ico') }}">
</head>

<body class="light dark-sidebar theme-purple">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <!-- navbar -->
            @include('partials.navbar')

            <!-- sidebar -->
            @include('partials.sidebar')

            <!-- content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>

            <!-- modal -->
            @stack('modal')

            <!-- footer -->
            @include('partials.footer')
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        @if (Session('error'))
            swal('Opps', '{{ session('error') }}', 'error');
        @endif
    </script>

    <script>
        @if (Session('success'))
            swal('Berhasil', '{{ session('success') }}', 'success');
        @endif
    </script>


    @stack('script')
</body>

</html>
