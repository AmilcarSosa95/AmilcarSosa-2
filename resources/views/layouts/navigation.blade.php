<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0">
                @if (isset($header))
                    {{ $header }}
                @endif
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav  justify-content-end">


                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

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
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-sm-1 cursor-pointer"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" :href="route('profile.edit')">
                                <div class="d-flex py-1">
                                    <div class="my-auto" style="margin-right: 1rem">
                                        <i class="fa fa-user" ></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{ __('Profile') }}</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="dropdown-item border-radius-md" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <div class="d-flex py-1">
                                    <div class="my-auto" style="margin-right: 1rem">
                                        <i class="fa fa-sign-out" ></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{ __('Log Out') }}</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

