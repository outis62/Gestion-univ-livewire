<div class="container">
    <a class="navbar-brand" href="index.html">
        <img src="{{ asset('assets/images/enabel-logo-color.svg') }}" class="card-logo card-logo-dark" alt="logo dark"
            height="22">
        <img src="{{ asset('assets/images/enabel-logo-white.svg') }}" class="card-logo card-logo-light" alt="logo light"
            height="22">
    </a>
    <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="mdi mdi-menu"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
            <li class="nav-item">
                <a class="nav-link fs-15 fw-semibold active" href="#hero">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-15 fw-semibold" href="#services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-15 fw-semibold" href="#features">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-15 fw-semibold" href="#plans">Plans</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-15 fw-semibold" href="#team">Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-15 fw-semibold" href="#contact">Contact</a>
            </li>
        </ul>
        <div class="">

            @if (Auth::check())
                <a href="javascripti:void(0);" class="btn btn-warning">Soumettre la demande</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-link fw-medium text-decoration-none text-dark">Sign in</a>
                {{-- <a href="{{ route('handler.signin') }}" class="btn btn-secondary">Login</a>
                <a href="{{ route('inscription') }}" class="btn btn-outline-danger">Faire une demande</a> --}}
            @endif
        </div>
        @if (Auth::check())
            <div class="dropdown ms-sm-3 header-item topbar-user">
                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('assets/images/users/user_profil.png') }}" alt="Header Avatar">
                        <span class="text-start ms-xl-2">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->nom }}
                                {{ Auth::user()->prenom }}</span>
                            <span
                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ getRoleText(Auth::user()->role) }}</span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end mt-5">
                    <h6 class="dropdown-header">{{ getRoleText(Auth::user()->role) }}</h6>
                    <a class="dropdown-item" href="{{ route('prospect.utilisateurs.show', Auth::user()->id) }}"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Profile</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('reset_password') }}"><i
                            class="bx bx-lock text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Accès</span></a>

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                            class="mdi mdi-logout fs-16 align-middle me-1" style="color: red"></i> <span
                            class="align-middle" data-key="t-logout">Déconnexion</span></a>
                </div>
            </div>
        @endif
    </div>
</div>
