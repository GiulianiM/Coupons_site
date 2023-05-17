@section('header')
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <strong>@yield('title')</strong>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-md-flex d-lg-flex align-items-md-center align-items-lg-center">
                        <!--TODO nome automatico-->
                        <span>Benvenuto<strong>&nbsp;Amministratore</strong></span>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('navbuttons')
    <div class="container">
        <button class="btn btn-warning navigation" type="button"><a href="{{ route('adminCompanies') }}">Aziende</a></button>
        <button class="btn btn-warning navigation" type="button"><a href="{{ route('adminStaff') }}">Staff</a></button>
        <button class="btn btn-warning navigation" type="button"><a href="{{ route('adminUsers') }}">Utenti</a></button>
        <button class="btn btn-warning navigation" type="button"><a href="{{ route('adminFaq') }}">FAQ</a></button>
        {{--<button class="btn btn-warning navigation" type="button" onclick="{{ route('statistiche') }}">Statistiche</button>--}}
    </div>
@endsection
