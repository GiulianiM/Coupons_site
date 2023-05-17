@include('layouts._navadmin')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/styles-admin.css')}}" type="text/css" media="all"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/49d9d591d6.js" crossorigin="anonymous"></script>
    <title>Dashboard | @yield('title')</title>
</head>

<body>
<div id="wrapper">
    <header class="shadow-sm">
        @yield('header')
    </header>

    @can('isAdmin')
    <div id="nav">
        @yield('navbuttons')
    </div>
    @endcan

    <div id="page">
        @yield('content')
    </div>


    <footer class="shadow">
        <div class="container"><span>Tecnologie Web 2023</span></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
