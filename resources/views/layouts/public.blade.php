<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/49d9d591d6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <noscript>
        Questo documento contiene codice JavaScript che il tuo browser non è in grado di eseguire
    </noscript>
    @yield('extra-css-jquery')
    <title>@yield('title')</title>
    <link rel=”icon” type=”image/ico” href=”{{ asset('favicon.ico') }}”>

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

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Coupons Site</span>
        </div>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="{{route ('company') }}" class="nav-link px-2 text-muted">Azienda</a></li>
            <li class="nav-item"><a href="{{route ('collabora') }}" class="nav-link px-2 text-muted">Collabora con
                    noi</a></li>
            <li class="nav-item"><a href="{{ route('utilizzo') }}" class="nav-link px-2 text-muted">Utilizzo</a></li>
            <li class="nav-item"><a href="{{route ('diritti') }}" class="nav-link px-2 text-muted">Diritti & Privacy</a></li>
        </ul>
    </footer>
    <!-- end #footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
