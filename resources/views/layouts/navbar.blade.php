<nav class="navbar navbar-expand-sm w-100 nav-fill justify-content-center navbar-light sticky-top">
    <a href="{{ url('/') }}" class="navbar-brand"><img id="nav_logo" src="{{ asset('res/png_noir.png') }}"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar-default" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{ route('home.categorie') }}">Catégorie</a></li>
            <li class="nav-item"><a href="{{ route('home.derniereSortie') }}">dernières sorties</a></li>
            <li class="nav-item"><a href="{{ route('home.topTendances') }}">top tendances</a></li>
            @if(Auth::check())
                @if(Auth::user()->administrateur==1)
                    <li class="nav-item"><a href="{{ route('home.admin') }}">Administration</a></li>
                @endif
            @endif


            @guest
                <li class="nav-item"><a href="{{ route('login') }}"><i class="fa fa-user"></i> Connexion</a></li>
                <li class="nav-item"><a href="{{ route('register') }}"><i class="fa fa-users"></i> Inscription</a></li>
            @else
                <li class="nav-item"><a href="{{route('accueilUser', Auth::id())}}}">Bonjour <strong>{{ Auth::user()->name }}</strong></a></li>
                @if (Auth::user())

                @endif
                <li class="nav-item"><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest

        </ul>
    </div>
</nav>
