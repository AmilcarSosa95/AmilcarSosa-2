<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>

    <!-- Scripts -->
    <!-- Scripts -->
    <script src="{{ asset('js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}" defer></script>

    <link href="{{ asset('css/soft-ui-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">
</head>
<body style="background: #e4e4e4">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ url('/') }}">
                        AmilcarSosa
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0 text-uppercase" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-globe cursor-pointer "></i> {{\Illuminate\Support\Facades\App::getLocale()}}
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                    @if(\Illuminate\Support\Facades\App::getLocale() != 'es')
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="{{url('lang/change?lang=es')}}">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto" style="margin-right: 1rem">

                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold"> {!! trans('producto.espaniol') !!}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @else
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="{{url('lang/change?lang=en')}}">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto" style="margin-right: 1rem">

                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">  {!! trans('producto.ingles') !!}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ route('menu.productos') }}">
                                    <i class="fa fa-product-hunt opacity-6 text-dark me-1"></i>
                                    {{ __('Productos') }}
                                </a>
                            </li>
                            @auth
                                <li class="nav-item">

                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                       href="{{ url('/dashboard') }}">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        {{ __('Dashboard') }}
                                    </a>

                                </li>
                            @else
                                @if (!request()->routeIs('register'))
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('register') }}">
                                            <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                            {{ __('Register') }}
                                        </a>
                                    </li>
                                @endif
                                @if (!request()->routeIs('login'))
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('login') }}">
                                            <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                            {{ __('Log in') }}
                                        </a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                {{$slot}}
            </div>
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8" style="margin-right: -800px !important;">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{asset('/img/curved-images/curved6.jpg')}})"></div>
            </div>
        </div>
    </section>
</main>
<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Softura Solutions by Amilcar.
                </p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
