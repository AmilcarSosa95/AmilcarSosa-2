<x-app-layout>

    <x-slot name="header">
        {!! trans('producto.edit_produc') !!} ({{$producto['sku']}})
    </x-slot>
    <form method="post" action="{{url('/admin/producto/modificar')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input hidden id="id" name="id" value="{{old('id',$producto['id'])}}"/>
        <input hidden id="idEs" name="idEs" value="{{old('idEs',$producto['idEs'])}}"/>
        <input hidden id="idEn" name="idEn" value="{{old('idEn',$producto['idEn'])}}"/>
        <div class="card mb-3">
            <div class="card-header pb-0">
                <h6>{!! trans('producto.inf_produc') !!}</h6>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="sku">{!! trans('producto.sku') !!}</label>
                                <input class="form-control  {{$errors->get('sku') ? 'is-invalid': ''}}"
                                       required
                                       type="number"
                                       id="sku"
                                       name="sku"
                                       value="{{old('sku',$producto['sku'])}}"
                                       placeholder="{!! trans('producto.sku') !!}">
                                @if($errors->has('sku'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('sku')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="puntos">{!! trans('producto.puntos') !!}</label>
                                <input class="form-control {{$errors->get('puntos') ? 'is-invalid': ''}}"
                                       type="number"
                                       required
                                       id="puntos"
                                       name="puntos"
                                       value="{{old('puntos',$producto['puntos'])}}"
                                       placeholder="{!! trans('producto.puntos') !!}">
                                @if($errors->has('puntos'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('puntos')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="precio_pesos">{!! trans('producto.precio_p') !!}</label>
                                <input class="form-control {{$errors->get('precio_pesos') ? 'is-invalid': ''}}"
                                       required
                                       type="number"
                                       step="any"
                                       id="precio_pesos"
                                       name="precio_pesos"
                                       value="{{old('precio_pesos',$producto['precio_pesos'])}}"
                                       placeholder="{!! trans('producto.precio_p') !!}">
                                @if($errors->has('precio_pesos'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('precio_pesos')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="precio_dolares">{!! trans('producto.precio_d') !!}</label>
                                <input class="form-control {{$errors->get('precio_dolares') ? 'is-invalid': ''}} "
                                       required
                                       type="number"
                                       step="any"
                                       id="precio_dolares"
                                       name="precio_dolares"
                                       value="{{old('precio_dolares',$producto['precio_dolares'])}}"
                                       placeholder="{!! trans('producto.precio_d') !!}">
                                @if($errors->has('precio_dolares'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('precio_dolares')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="accordion">
            <div class="card mb-3">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true"
                                aria-controls="collapseOne">
                            {!! trans('producto.espaniol') !!}
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nombreEs">{!! trans('producto.nombre') !!}</label>
                                        <input class="form-control {{$errors->get('nombreEs') ? 'is-invalid': ''}} "
                                               required
                                               id="nombreEs"
                                               name="nombreEs"
                                               value="{{old('nombreEs',$producto['nombreEs'])}}"
                                               placeholder="{!! trans('producto.nombre') !!}">
                                        @if($errors->has('nombreEs'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('nombreEs')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="descripcionCortaEs">{!! trans('producto.desc_corta') !!}</label>
                                        <input
                                            class="form-control {{$errors->get('descripcionCortaEs') ? 'is-invalid': ''}}"
                                            type="text"
                                            required
                                            maxlength="120"
                                            id="descripcionCortaEs"
                                            name="descripcionCortaEs"
                                            value="{{old('descripcionCortaEs',$producto['descripcionCortaEs'])}}"
                                            placeholder="{!! trans('producto.desc_corta') !!}">
                                        @if($errors->has('descripcionCortaEs'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('descripcionCortaEs')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label
                                            for="descripcionLargaEs">{!! trans('producto.desc_larga') !!}</label>
                                        <textarea
                                            class="form-control {{$errors->get('descripcionLargaEs') ? 'is-invalid': ''}}"
                                            id="descripcionLargaEs"
                                            name="descripcionLargaEs"
                                            placeholder="{!! trans('producto.desc_larga') !!}">{{old('descripcionLargaEs',$producto['descripcionLargaEs'])}}</textarea>
                                        @if($errors->has('descripcionLargaEs'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('descripcionLargaEs')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                            {!! trans('producto.ingles') !!}
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nombreEn">{!! trans('producto.nombre') !!}</label>
                                        <input class="form-control {{$errors->get('nombreEn') ? 'is-invalid': ''}}"
                                               required
                                               id="nombreEn"
                                               name="nombreEn"
                                               value="{{old('nombreEn',$producto['nombreEn'])}}"
                                               placeholder="{!! trans('producto.nombre') !!}">
                                        @if($errors->has('nombreEn'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('nombreEn')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="descripcionCortaEn">{!! trans('producto.desc_corta') !!}</label>
                                        <input
                                            class="form-control  {{$errors->get('descripcionCortaEn') ? 'is-invalid': ''}} "
                                            type="text"
                                            required
                                            maxlength="120"
                                            id="descripcionCortaEn"
                                            name="descripcionCortaEn"
                                            value="{{old('descripcionCortaEn',$producto['descripcionCortaEn'])}}"
                                            placeholder="{!! trans('producto.desc_corta') !!}">
                                        @if($errors->has('descripcionCortaEn'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('descripcionCortaEn')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label
                                            for="descripcionLargaEn">{!! trans('producto.desc_larga') !!}</label>
                                        <textarea
                                            class="form-control {{$errors->get('descripcionLargaEn') ? 'is-invalid': ''}}"
                                            id="descripcionLargaEn"
                                            name="descripcionLargaEn"
                                            placeholder="{!! trans('producto.desc_larga') !!}">{{old('descripcionLargaEn',$producto['descripcionLargaEn'])}}</textarea>
                                        @if($errors->has('descripcionLargaEn'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('descripcionLargaEn')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-end">
                <a href="{{route('producto.index')}}"
                   class="btn btn-secondary">{!! trans('producto.cancelar') !!}</a>
                <button type="submit" class="btn btn-primary">{!! trans('producto.guardar') !!}</button>
            </div>
        </div>

    </form>
</x-app-layout>


<script>
    $(document).ready(() => {
        $(document).on("keyup", '#precio_dolares', function () {
            axios.post("{{route('producto.cambio')}}", {cantidad: $("#precio_dolares").val()}).then(res => {
                $("#precio_pesos").val(res.data)
            })
        });
        $(document).on("keyup", '#precio_pesos', function () {
            axios.post("{{route('producto.cambioAdolar')}}", {cantidad: $("#precio_pesos").val()}).then(res => {
                $("#precio_dolares").val(res.data)
            })
        });
    });
</script>
