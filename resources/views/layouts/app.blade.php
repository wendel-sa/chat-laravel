<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Styles -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg" color="#6366f1')}}">
    <link rel="shortcut icon" href="{{asset('assets/favicon/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#080032')}}">
    <meta name="msapplication-config" content="{{asset('assets/favicon/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/theme.min.css')}}">

    <!-- Page loading styles -->
    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .dark-mode .page-loading {
            background-color: #0b0f19;
        }

        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .page-loading.active>.page-loading-inner {
            opacity: 1;
        }

        .page-loading-inner>span {
            display: block;
            font-size: 1rem;
            font-weight: normal;
            color: #9397ad;
        }

        .dark-mode .page-loading-inner>span {
            color: #fff;
            opacity: .6;
        }

        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #b4b7c9;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        .dark-mode .page-spinner {
            border-color: rgba(255, 255, 255, .4);
            border-right-color: transparent;
        }

        .texto {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }


        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>



    <!-- Theme mode -->
    <script>
        let mode = window.localStorage.getItem('mode'),
            root = document.getElementsByTagName('html')[0];
        if (mode !== null && mode === 'dark') {
            root.classList.add('dark-mode');
        } else {
            root.classList.remove('dark-mode');
        }
    </script>

    <!-- Page loading scripts -->
    <script>
        (function() {
            window.onload = function() {
                const preloader = document.querySelector('.page-loading');
                preloader.classList.remove('active');
                setTimeout(function() {
                    preloader.remove();
                }, 1000);
            };
        })();
    </script>
</head>

<body>

    <!-- Page loading spinner -->
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div><span>Loading...</span>
        </div>
    </div>


    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    <main class="">
        <!-- Navbar -->
        <!-- Remove "fixed-top" class to make navigation bar scrollable with the page -->
        <header class="header navbar navbar-expand-lg bg-light shadow-sm fixed-top">
            <div class="container px-3">
                <a href="#" class="navbar-brand pe-3">
                    Chat Laravel
                </a>
                <div id="navbarNav" class="offcanvas offcanvas-end">
                    <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">

                                @if (Route::has('login'))
                                @auth
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-current="page">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu p-0">
                                    <div class="d-lg-flex">
                                        <div class="mega-dropdown-column pt-lg-3 pb-lg-4">

                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400 dark:text-gray-600">
                                                {{ __('Manage Account') }}
                                            </div>

                                            <x-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-dropdown-link>
                                            @endif

                                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                                @else
                                <a href="{{route('login')}}" class="nav-link {{request()->routeIs('login') ? 'active' : ''}}">Login</a>
                                @endauth
                                @endif

                            </li>
                            <li class="nav-item">
                                <a href="{{route('chat')}}" class="nav-link {{request()->routeIs('chat') ? 'active' : ''}}"><i class="bx bx-chat me-2"></i>Chat</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('docs')}}" class="nav-link {{request()->routeIs('docs') ? 'active' : ''}}"><i class="bx bx-docs me-2"></i>Documentação</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
                    <input type="checkbox" class="form-check-input" id="theme-mode">
                    <label class="form-check-label d-none d-sm-block" for="theme-mode">Light</label>
                    <label class="form-check-label d-none d-sm-block" for="theme-mode">Dark</label>
                </div>
                <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </header>

        <!-- Page Content -->
        <main class="fixed-bottom pt-5 mb-0 h-100 pt-lg-6 text-dark">
            {{ $slot }}
        </main>
        @livewire('alerta-component')
    </main>





    <!-- Back to top button -->
    <a href="#top" class="btn-scroll-top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
        <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
    </a>

    @stack('modals')

    @livewireScripts

    @stack('scripts')

    <!-- Vendor Scripts -->
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{asset('assets/vendor/rellax/rellax.min.js')}}"></script>
    <script src="{{asset('assets/vendor/@lottiefiles/lottie-player/dist/lottie-player.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Main Theme Script -->
    <script src="{{asset('assets/js/theme.min.js')}}"></script>
    <script src="{{asset('assets/js/qrcode.js')}}"></script>


</body>

</html>
