<x-guest-layout>
    <x-slot name="header">
            {!! trans('producto.det_product') !!}
    </x-slot>

    <div class="card">
        <div class="card-header p-0 mx-3 mt-3  z-index-1">
            <a href="javascript:;" class="d-block">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfVglTBT3gBM5pnwKtxGBADOEK9bN7ODieHY-x6ixPg0YLqn535PsFD06uYfC4htqroII&usqp=CAU"
                    class="img-fluid border-radius-lg">
            </a>
        </div>

        <div class="card-body pt-2">
            <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{!! trans('producto.sku') !!}: {{$producto['sku']}}</span>
            <p class="card-title h5 d-block text-darker">
                {{$producto['nombre']}}
            </p>
            <p class="card-description mb-4">
                {{$producto['descripcionLarga']}}
            </p>
            <div class="">
                <div class="name text-end ps-3">
                            <span>
                                @if(\Illuminate\Support\Facades\App::getLocale() != 'es')
                                    --}}
                                    <span>   ${{$producto['precio_dolares']}}</span>
                                @endif
                                @if(\Illuminate\Support\Facades\App::getLocale() != 'en')
                                    <span>   ${{$producto['precio_pesos']}}</span>
                                @endif
                            </span>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

