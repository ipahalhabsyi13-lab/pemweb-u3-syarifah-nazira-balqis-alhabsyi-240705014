
<header class="site-header">
    <nav class="nav container">

        <a href="{{ route('home') }}" class="brand">
            ♡ Sweet<span>News</span>
        </a>

        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>

        @auth
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('articles.index') }}"
               class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">
                Artikel
            </a>

            <div class="right">
                <span class="muted">
                    Halo, {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-small">
                        Logout
                    </button>
                </form>
            </div>
        @endauth

        @guest
            <div class="right">
                <a href="{{ route('login') }}"
                   class="{{ request()->routeIs('login') ? 'active' : '' }}">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="{{ request()->routeIs('register') ? 'active' : '' }}">
                    Register
                </a>
            </div>
        @endguest

    </nav>
</header>
