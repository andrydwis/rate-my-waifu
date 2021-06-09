<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Custom CSS -->
    @yield('customCSS')

    <title>{{config('app.name')}}</title>
</head>

<body class="d-flex flex-column bg-dark h-100">
    @include('layouts.navbar')
    <div class="mb-5"></div>
    @yield('content')
    @include('layouts.footer')
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- FA Icon -->
    <script src="https://kit.fontawesome.com/8482c12eb4.js" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    @yield('customJS')
</body>

</html>