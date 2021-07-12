<div class="container-fluid">
    <h1 class="navbar-brand navbar-brand-autodark">
        <a href="{{route('dashboard')}}">
            <img src="{{ asset('static/logos/logo.png') }}" width="110" alt="ap" class="navbar-brand-image">
        </a>
    </h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="navbar-nav pt-lg-3">
            <li class="nav-item {{ active(['admin/dashboard']) }}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                        Dashboard
                    </span>
                </a>
            </li>
            @if(@Auth::user()->user_type == 1)
                <li class="nav-item dropdown {{ active(['admin/user*']) }}">

                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" role="button"
                        aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="6" height="5" rx="2" />
                                <rect x="4" y="13" width="6" height="7" rx="2" />
                                <rect x="14" y="4" width="6" height="7" rx="2" />
                                <rect x="14" y="15" width="6" height="5" rx="2" /></svg>
                        </span>
                        <span class="nav-link-title">
                            Manage Network
                        </span>
                    </a>
                    <div class="dropdown-menu @if (is_active(['user*'])) show @endif"">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item {{ active(['user*']) }}" href="{{ route('user') }}">
                                    Users
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
            <li class="nav-item dropdown {{ active(['admin/page*']) }}">
                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" role="button"
                    aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <rect x="4" y="4" width="6" height="5" rx="2" />
                            <rect x="4" y="13" width="6" height="7" rx="2" />
                            <rect x="14" y="4" width="6" height="7" rx="2" />
                            <rect x="14" y="15" width="6" height="5" rx="2" /></svg>
                    </span>
                    <span class="nav-link-title">
                        Manage Page
                    </span>
                </a>
                <div class="dropdown-menu @if (is_active(['admin/page*'])) show @endif"">
                    <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item {{ active(['admin/page/general']) }}" href="{{ route('general') }}">
                                General
                            </a>
                        </div>
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item {{ active(['admin/page/social']) }}" href="{{ route('social') }}">
                                Social Links
                            </a>
                        </div>
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" target="_blank" href="{{ route('page',['username'=>@Auth::user()->username]) }}">
                                My Page
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('settings')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="9 11 12 14 20 6" />
                            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </span>
                    <span class="nav-link-title">
                        Settings
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M7 12h14l-3 -3m0 6l3 -3" /></svg>
                    </span>
                    <span class="nav-link-title">
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
