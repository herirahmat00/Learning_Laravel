<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Administrator</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('assets/img/favicon.ico')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

</head>

<body>
    <div class="main-wrapper main-wrapper-1">
        @yield('sidebar')
        @yield('content')
        @yield('footer')
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>