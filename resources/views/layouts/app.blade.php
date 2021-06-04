<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    @yield('customCSS')

    <title>{{config('app.name')}}</title>
</head>

<body class="d-flex flex-column h-100">
    @include('layouts.navbar')
    @yield('content')
    <div class="mb-5"></div>
    @include('layouts.footer')
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- FA Icon -->
    <script src="https://kit.fontawesome.com/8482c12eb4.js" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    @yield('customJS')
</body>

</html>