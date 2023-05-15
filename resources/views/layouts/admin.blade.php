<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>LaProj5 | @yield('title', 'Catalogo')</title>
    </head>
    <body id="bodyadmin">
        <div id="wrapper">
            <div id="menu">
                @include('layouts/_navadmin')
            </div>

            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        @yield('content')
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>

            <!-- end #content -->
            <div id="footer">
                <br>
                <p>universit&agrave; politecnica delle marche - Corso di  <a href="https://learn.univpm.it/course/view.php?id=7098">tecnologie web</a>.</p>
            </div>
            <!-- end #footer -->
        </div>
    </body>
</html>