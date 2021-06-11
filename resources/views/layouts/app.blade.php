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
    <!-- Hover -->
    <link href="{{asset('css/hover.css')}}" rel="stylesheet">
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- GFont -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
        .pacifico {
            font-family: 'Pacifico', cursive;
        }
    </style>
    <!-- Scroll To Top -->
    <style>
        .back-to-top {
            display: none;
            position: fixed;
            bottom: 100px;
            right: 25px;
        }
    </style>
    <!-- Custom CSS -->
    @yield('customCSS')

    <title>{{config('app.name')}}</title>
</head>

<body class="d-flex flex-column bg-dark h-100">
    @include('layouts.navbar')
    <div class="mb-5"></div>
    @yield('content')
    <button id="scroll-to-top" class="btn btn-light border border-2 border-dark hvr-float back-to-top" onclick="topFunction()"><i class="fas fa-arrow-up"></i></button>
    @include('layouts.footer')
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- FA Icon -->
    <script src="https://kit.fontawesome.com/8482c12eb4.js" crossorigin="anonymous"></script>
    <!-- Scroll To Top -->
    <script>
        scrollToTop = document.getElementById("scroll-to-top");
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollToTop.style.display = "block";
            } else {
                scrollToTop.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <!-- Custom JS -->
    @yield('customJS')
</body>

</html>