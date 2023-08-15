<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.svg') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/ti-icons/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendors/simple-line-icons/css/simple-line-icons.css') }}" />
    <!-- <link rel="stylesheet" href="js/select.dataTables.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('frontend/sweetalert2/bootstrap-4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

    @yield('style')
</head>

<body>
    <div class="container-scroller">
        @include('layouts.header')

        <div class="container-fluid page-body-wrapper">
            @include('layouts.sidebar')
            <div class="main-panel">
                @include('layouts.messages')
                @yield('content')
                @include('layouts.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('frontend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- <script src="vendors/progressbar.js/progressbar.min.js"></script> -->
    <script src="{{ asset('frontend/js/off-canvas.js') }}"></script>
    <script src="{{ asset('frontend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('frontend/dist/js/demo.js') }}"></script>
    <script src="{{ asset('frontend/sweetalert2/sweetalert2.min.js') }}"></script>



    @yield('scripts')

</body>

</html>
