<x-guest-layout>
    <div class="row mb-3">
        <div class="col">
            <form method="post" action="{{url('/productos')}}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white border-radius-lg d-flex me-2">
                    <input type="text"
                           id="clave"
                           name="clave"
                           value="{{old('clave')}}"
                           class="form-control border-0 ps-3" placeholder="Nombre o SKU">
                    <select
                        style="color: black; width: 100%"
                        class="form-control border-0 ps-3 w-25"
                        type="number"
                        id="orden"
                        name="orden"
                        value="{{old('orden')}}"
                        placeholder="{!! trans('producto.puntos') !!}">
                        <option value="{{null}}" >Ordenar</option>
                        <option value="desc">Mayor a menor</option>
                        <option value="asc">Menor a Mayor</option>
                    </select>
                    <button type="submit" class="btn bg-gradient-primary my-1 me-1">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($productos as  $producto)
            <div class="p-1 col-md-2 col-sm-6">
                <div class="card" style="max-height: 50vh;">
                    <div class="card-header text-center p-0 mx-3 mt-3  z-index-1">
                        <a href="{{url('').'/'.$producto->url}}" class="d-block">
                            <img width="100"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfVglTBT3gBM5pnwKtxGBADOEK9bN7ODieHY-x6ixPg0YLqn535PsFD06uYfC4htqroII&usqp=CAU"
                                class="img-fluid border-radius-lg">
                        </a>
                    </div>

                    <div class="card-body pt-2">
                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{!! trans('producto.sku') !!}: {{$producto->sku}}</span>
                        <a href="{{url('').'/'.$producto->url}}" class="card-title h5 d-block text-darker">
                            {{$producto->nombre}}
                        </a>
                        <p class="card-description mb-4" style=" white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;">
                            {{$producto->descripcion_corta}}
                        </p>
                        <div class="">
                            <div class="name text-end ps-3">
                            <span>
                                @if(\Illuminate\Support\Facades\App::getLocale() != 'es')
                                    <span>   ${{$producto->precio_dolares}}</span>
                                @endif
                                @if(\Illuminate\Support\Facades\App::getLocale() != 'en')
                                    <span>   ${{$producto->precio_pesos}}</span>
                                @endif
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-guest-layout>
