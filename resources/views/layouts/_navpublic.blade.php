<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logo.png')}}" class="d-inline-block align-top" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName() == 'homepage' ? 'active' : '' }}" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName() == 'aziende' ? 'active' : '' }}" href="{{ route('aziende') }}">Aziende</a>
                </li>
                @can('isStaff')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'staff' ? 'active' : '' }}" href="{{ route('staff') }}">Dashboard</a>
                    </li>
                @endcan
                @can('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'admin' ? 'active' : '' }}" href="{{ route('admin') }}">Dashboard</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link {{ Request::route()->getName() == 'faq' ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a>
                </li>
                @can('isUser')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'profilo' ? 'active' : '' }}" href="{{ route('homepage') }}">Profilo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endcan
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'Login' ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::route()->getName() == 'signup' ? 'active' : '' }}" href="{{ route('signup') }}">Signup</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
