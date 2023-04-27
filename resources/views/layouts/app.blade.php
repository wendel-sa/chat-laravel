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


    @stack('styles')

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

        .msg {
            visibility: hidden;
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

<body style="background-color: #f1f3f4;">



    <main class="row">


        <!-- Navbar -->
        <!-- Remove "fixed-top" class to make navigation bar scrollable with the page
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

                                            <!-- Account Management 
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

                                            <!-- Authentication 
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
                                <a href="{{route('p')}}" class="nav-link {{request()->routeIs('p') ? 'active' : ''}}"><i class="bx bx-info-circle me-2"></i>Apresentação</a>
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
    -->

        <div class="row">

            <div class="col-1 mx-3" style="width: 4.5rem;">

                <aside class="flex-column flex-shrink-0 p-3">
                    <a href="#" class="d-block p-3 link-body-emphasis text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="bi bi-chat-left-text fs-3"></i>
                        <span class="visually-hidden">Icon-only</span>
                    </a>
                    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                        <li class="nav-item">
                            <a href="#" class="nav-link active py-3 border-bottom rounded-0" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                                <i class="bx bx-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('chat')}}" class="nav-link py-3 border-bottom rounded-0 {{request()->routeIs('chat') ? 'active' : ''}}" title="chat" data-bs-toggle="tooltip" data-bs-placement="right">
                                <i class="bi bi-chat-left-text"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('p')}}" class="nav-link {{request()->routeIs('p') ? 'active' : ''}} py-3 border-bottom rounded-0" title="Apresentações" data-bs-toggle="tooltip" data-bs-placement="right">
                                <i class="bi bi-file-earmark-easel-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Products" data-bs-toggle="tooltip" data-bs-placement="right">
                                <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Products">
                                    <use xlink:href="#grid" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('docs')}}" class="nav-link {{request()->routeIs('docs') ? 'active' : ''}} py-3 border-bottom rounded-0" title="Documentação" data-bs-toggle="tooltip" data-bs-placement="right">
                                <i class="bi bi-info"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown border-top">
                        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                            @else
                            <div class="nav-link py-3 border-bottom rounded-0 text-uppercase d-flex align-items-center justify-content-center">
                                <span class="initials"></span>
                            </div>
                            @endif
                        </a>
                        <ul class="dropdown-menu text-small shadow">
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
                        </ul>
                    </div>
                </aside>

            </div>



            <div class="col-11 container pt-5">
                <main class="mb-0 h-100 pt-lg-6 shadow shadow-primary bg-faded-primary">
                    {{ $slot }}
                </main>
            </div>

        </div>
        @livewire('alerta-component')
    </main>





    <!-- Back to top button -->
    <a href="#top" class="btn-scroll-top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
        <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
    </a>



    @livewireScripts

    @stack('scripts')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <!-- Vendor Scripts -->
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{asset('assets/vendor/rellax/rellax.min.js')}}"></script>
    <script src="{{asset('assets/vendor/@lottiefiles/lottie-player/dist/lottie-player.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/lightgallery/plugins/fullscreen/lg-fullscreen.min.js')}}"></script>
    <script src="{{asset('assets/vendor/lightgallery/plugins/zoom/lg-zoom.min.js')}}"></script>
    <script src="{{asset('assets/vendor/lightgallery/plugins/video/lg-video.min.js')}}"></script>
    <script src="{{asset('assets/vendor/lightgallery/plugins/thumbnail/lg-thumbnail.min.js')}}"></script>
    <script src="{{asset('assets/vendor/lightgallery/lightgallery.min.js')}}"></script>

    <!-- Main Theme Script -->
    <script src="{{asset('assets/js/theme.min.js')}}"></script>
    <script src="{{asset('assets/js/qrcode.js')}}"></script>
    <script>
        var name = "{{ Auth::user()->name }}";
        var initials = name.split(' ').map(function(n) {
            return n[0];
        }).join('');

        document.querySelector('.initials').textContent = initials;
    </script>


    @stack('modals')

</body>

</html>