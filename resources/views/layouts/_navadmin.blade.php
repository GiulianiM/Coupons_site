<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @can('isAdmin')
            <a class="navbar-brand fw-bold" href="{{route('admin.aziende')}}">Dashboard Admin</a>
        @endcan
        @can('isStaff')
            <a class="navbar-brand fw-bold" href="{{route('staff.promos')}}">Dashboard Staff</a>
        @endcan
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName() == 'homepage' ? 'active' : '' }}"
                       href="{{ route('homepage') }}">Home</a>
                </li>
                @can('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'admin.aziende' ? 'active' : '' }}"
                           href="{{ route('admin.aziende') }}">Aziende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'admin.faq' ? 'active' : '' }}"
                           href="{{ route('admin.faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'admin.staff' ? 'active' : '' }}"
                           href="{{ route('admin.staff') }}">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'admin.users' ? 'active' : '' }}"
                           href="{{ route('admin.users') }}">Utenti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'admin.stats' ? 'active' : '' }}"
                           href="{{ route('admin.stats') }}">Statistiche</a>
                    </li>
                @endcan
                @can('isStaff')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'staffPromos' ? 'active' : '' }}"
                           href="{{ route('staff.promos') }}">Promozioni</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
