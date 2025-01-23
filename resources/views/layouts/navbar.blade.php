<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid container">



        <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand me-5" href="{{ route('regency.index') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Coat_of_arms_of_Jakarta.svg/800px-Coat_of_arms_of_Jakarta.svg.png"
                    alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <span class="fw-semibold">DKI Jakarta</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('regency.index') ? 'active fw-bold' : '' }}"
                        href="{{ route('regency.index') }}">Populasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
