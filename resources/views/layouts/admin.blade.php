@include('layouts._navadmin')
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    {{--DataTables--}}
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    {{--Extra CSS e JQuery--}}
    @yield('extra-css-jquery')
    <title>Dashboard | @yield('title')</title>
</head>
<body>
<div id="wrapper">
    <header class="shadow-sm">
        @yield('header')
    </header>

    <div id="page">
        @yield('content')
    </div>


    <footer>
        <div class="border-top mx-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><span>Tecnologie Web 2023</span></div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>


</html>
