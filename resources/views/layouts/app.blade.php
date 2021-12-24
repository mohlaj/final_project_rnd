<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- fontawesom-cdn  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    
    <link rel="stylesheet" href="{{ asset('vendors') }}/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/base/vendor.bundle.base.css">

    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
    
    <link rel="shortcut icon" href="/images/favicon.png" />
    <style>
        .form-group label {
            font-weight: 600;
        }

        a.nav-link.active {
            border: 2px solid lightgrey;
            background: white;
            box-shadow: 0px 0px 2px 1px rgb(0 0 0 / 20%);
            font-weight: 600
        }
    </style>
</head>

<body>
    @if (!request()->is('login') && !request()->is('register'))
    <div class="container-scroller">
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container-fluid">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                        <ul class="navbar-nav navbar-nav-left">
                            <li class="nav-item ms-0 me-5 d-lg-flex d-none">
                                <a href="#" class="nav-link horizontal-nav-left-menu"><i
                                        class="mdi mdi-format-list-bulleted"></i></a>
                            </li>


                        </ul>
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <h4 class="text-dark">{{ config('app.name', 'Laravel') }}</h4>
                        </div>
                        <ul class="navbar-nav navbar-nav-right">

                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    id="profileDropdown">
                                    <span class="nav-profile-name">{{auth()->user()->name}}</span>
                                    <span class="online-status"></span>
                                    <img src="images/faces/face28.png" alt="profile" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                    aria-labelledby="profileDropdown">

                                    <a class="dropdown-item" href="{{ asset('logout') }}">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">

                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('dashboard') ? 'active' : ''}}" href="{{ asset('dashboard') }}">
                                <i class="mdi mdi-grid-large menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        @if (auth()->user()->role == 'PM')
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('project-leader*') ? 'active' : ''}}" href="{{ asset('project-leader') }}">
                                <i class="mdi mdi-book-multiple menu-icon"></i>
                                <span class="menu-title">Project Leader</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('staff*') ? 'active' : ''}}" href="{{ asset('staff') }}">
                                <i class="menu-icon mdi mdi-account-switch"></i>
                                <span class="menu-title">Staff</span>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->role == 'PL')
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('team-member*') ? 'active' : ''}}" href="{{ asset('team-member') }}">
                                <i class="mdi mdi-source-fork menu-icon"></i>
                                <span class="menu-title">Team member</span>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->role == 'PM' || auth()->user()->role == 'PL')
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('project*') ? 'active' : ''}}" href="{{ asset('project') }}">
                                <i class="mdi mdi-projector-screen menu-icon"></i>
                                <span class="menu-title">Project</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                     @yield('content')
                </div>
                <footer class="footer">
                    <div class="footer-wrap">

                    </div>
                </footer>
            </div>
        </div>
    </div>
    @else
    <div class="mt-5">
        @yield('content')

    </div>
    @endif

    <script src="{{ asset('vendors') }}/base/vendor.bundle.base.js"></script>
    <script src="{{ asset('js') }}/template.js"></script>
    <script src="{{ asset('js') }}/dashboard.js"></script>
</body>

</html>
