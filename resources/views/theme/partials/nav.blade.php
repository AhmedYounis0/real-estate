<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('theme.index') }}" class="logo">
            <img src="/storage/settings/{{ $siteSettings['logo']['image'] }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('theme.index') }}">
                    <img src="/storage/settings/{{ $siteSettings['logo']['image'] }}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="{{ route('theme.index') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('theme.properties.index') }}" class="nav-link">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('theme.agents.index') }}" class="nav-link">Agents</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('theme.locations.index') }}" class="nav-link">Locations</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('theme.pricing') }}" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('theme.faq') }}" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('theme.blogs.index') }}" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('theme.contact') }}" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                        @if(!Auth::check())
                            <a href="{{ route('login') }}" class="nav-link">Login / Register</a>
                        @endif
                        @if(Auth::check())
                            @if(Auth::user()->role == 'user')
                                <a href="{{ route('user.dashboard') }}" class="nav-link">Dashboard</a>
                            @endif
                            @if(Auth::user()->role == 'agent')
                                <a href="{{ route('agent.dashboard') }}" class="nav-link">Dashboard</a>
                            @endif
                        @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
