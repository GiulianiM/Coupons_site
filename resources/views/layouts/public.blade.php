<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @yield('extra-css')
    <title>@yield('title')</title>
</head>
<body>
<div id="wrapper">
    <header>
        @include('layouts/_navpublic')
    </header>

    <div id="page">
        @yield('content')
    </div>

    <!-- end #content -->

    <!-- Footer -->
    <footer class="row row-cols-5 5 pt-5 mt-5 mx-0 border-top">
        <div class="col-2 me-auto mb-3">
            <a href="{{ route('homepage') }}" class="d-flex align-items-center link-dark text-decoration-none">
                <img src="{{asset('images/logo.png')}}" alt="coupon1">
            </a>
        </div>

        <div class="col me-auto">
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="{{ route('homepage') }}" class="nav-link p-0 text-muted">Nome sito</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Telefono</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Email</a></li>
            </ul>
        </div>

        <div class="col me-auto">
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Azienda</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Chi siamo</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Collabora con noi</a></li>
            </ul>
        </div>

        <div class="col">
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Utilizzo</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQ</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Diritti & Privacy</a></li>
            </ul>
        </div>
    </footer>
    <!-- end #footer -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/49d9d591d6.js" crossorigin="anonymous"></script>
    @yield('extra-js')
</div>
</body>
</html>
