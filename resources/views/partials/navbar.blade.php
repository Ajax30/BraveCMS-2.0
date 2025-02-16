<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo-black.png') }}" alt="Brave CMS">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @auth
                @if ($agent->isMobile())
                    @include('partials/search')
                @endif

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase {{ request()->routeIs('dashboard.articles*') ? 'active' : '' }}"
                            href="{{ route('dashboard.articles') }}">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase {{ request()->routeIs('dashboard.categories*') ? 'active' : '' }}"
                            href="{{ route('dashboard.categories') }}">Categories</a>
                    </li>
                </ul>

                @if (!$agent->isMobile())
                    @include('partials/search')
                @endif
            @endauth

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item profile-menu dropdown d-flex">

                        <img class="rounded-circle avatar-top" id="top_avatar"
                            src="{{ asset('images/avatars') }}/{{ auth()->user()->avatar }}"
                            alt="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}">


                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('homepage') }}">
                                {{ __('Website') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>

                            @userCan('edit-settings')
                                <a class="dropdown-item" href="{{ route('dashboard.settings') }}">
                                    {{ __('Site settings') }}
                                </a>
                            @enduserCan

                            @userCan('manage-user-rights')
                                <a class="dropdown-item" href="{{ route('user-rights') }}">
                                    {{ __('Manage users') }}
                                </a>
                            @enduserCan

                            @userCan('manage-user-rights')
                                <a class="dropdown-item" href="{{ route('available-permissions') }}">
                                    {{ __('Permissions') }}
                                </a>
                            @enduserCan

                            <a class="dropdown-item" href="{{ route('user') }}">
                                {{ __('Your profile') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
