<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fw-bold" href="{{route('adminCompanies')}}">Dashboard Admin</a>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName() == 'homepage' ? 'active' : '' }}"
                       href="{{ route('homepage') }}">Home</a>
                </li>
                @can('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'adminCompanies' ? 'active' : '' }}"
                           href="{{ route('adminCompanies') }}">Aziende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'adminFaq' ? 'active' : '' }}"
                           href="{{ route('adminFaq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'adminStaff' ? 'active' : '' }}"
                           href="{{ route('adminStaff') }}">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'adminUsers' ? 'active' : '' }}"
                           href="{{ route('adminUsers') }}">Utenti</a>
                    </li>
                @endcan
                @can('isStaff')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'staffPromo' ? 'active' : '' }}"
                           href="{{ route('staffPromo') }}">Promozioni</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
