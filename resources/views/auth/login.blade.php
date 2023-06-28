<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card  mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">{{__('Bienvenido')}}</h3>
                    <p class="mb-0">{{__('ms_login')}}</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <label>{{__('correo')}}</label>
                        <div class="mb-3">
                            <input  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control" placeholder="{{__('correo')}}" aria-label="Email" aria-describedby="email-addon">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <label>{{__('pass')}}</label>
                        <div class="mb-3">
                            <input type="password"
                                   name="password"
                                   required autocomplete="current-password" class="form-control" placeholder="{{__('pass')}}" aria-label="Password" aria-describedby="password-addon">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                            <label class="form-check-label" for="rememberMe">{{__('recuerdame')}}</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Iniciar Sesion</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    @if (Route::has('password.request'))
                    <p class="mb-4 text-sm mx-auto">
                        {{__('Olvide mi cuenta')}}
                        <a href="{{ route('password.request') }}" class="text-info text-gradient font-weight-bold">Clic aquí</a>
                    </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{asset('/img/curved-images/curved6.jpg')}})"></div>
            </div>
        </div>
    </div>
</x-guest-layout>
