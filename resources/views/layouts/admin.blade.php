<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    {{--Stile CSS--}}
    <link rel="stylesheet" href="{{ asset('css/styles-admin.css')}} " type="text/css" media="all"/>
    {{--Bootstrap--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    {{--Font Awesome--}}
    <script src="https://kit.fontawesome.com/49d9d591d6.js" crossorigin="anonymous"></script>
    {{--JQuery--}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    {{--DataTables--}}
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <noscript>
        Questo documento contiene codice JavaScript che il tuo browser non è in grado di eseguire
    </noscript>
    {{--Extra CSS--}}
    @section('links')
    @show
    {{--Extra JS--}}
    @section('scripts')
    @show
    <title>Dashboard | @yield('title')</title>
</head>
<body>
<div id="wrapper">
    <header class="shadow-sm">
        @include('layouts._navadmin')
    </header>

    <div id="page">
        @yield('content')
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="{{ route('homepage') }}" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <image href="{{asset('images/logo.png')}}" width="30" height="24"/>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Coupons Site</span>
        </div>
    </footer>
    {{--Bootstrap JS--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
