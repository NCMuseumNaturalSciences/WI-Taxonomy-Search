<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Wi Taxonomy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Searches</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('wildlife-insights/taxonomy/search') }}">WI Taxonomy Search</a>
                </div>
            </li>
            <li class="nav-item dropdown hidden">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownAuth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <p>Auth</p>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownAuth">
                    @auth
                        <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                    @else
                        <a class="dropdown-item" href="{{ url('login') }}">Login</a>
                        <a class="dropdown-item" href="{{ url('register') }}">Register</a>
                    @endauth
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>
