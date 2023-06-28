<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="wdth=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />


        <script src="{{ asset('js/core/popper.min.js') }}" defer></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}" defer></script>
        <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}" defer></script>

        <link href="{{ asset('css/soft-ui-dashboard.css') }}?v=1.0.7" rel="stylesheet" >
        <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">


    </head>
    <body class="g-sidenav-show  bg-gray-100">
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps ps--active-y bg-white" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="{{url('/dashboard')}}" target="_blank">
                    <span class="ms-1 font-weight-bold">Amilcar Sosa</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('dashboard') ? 'active': ''}}" href="{{url('/dashboard')}}">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-home"></i>
                            </div>
                            <span class="nav-link-text ms-1">{{trans('producto.inicio')}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('producto.index') ? 'active': ''}}"  href="{{route('producto.index')}}">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                               <i class="fa fa-cog"></i>
                            </div>
                            <span class="nav-link-text ms-1">   {!! trans('producto.admin_productos') !!}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

            @include('layouts.navigation')

            <div class="container-fluid py-4">
                <div style="min-height: 100vh">
                    {{$slot}}
                </div>
                <footer class="footer pt-3  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    Softura Solution <i class="fa fa-heart"></i> by
                                   Amilcar Sosa
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" ></script>

</html>
