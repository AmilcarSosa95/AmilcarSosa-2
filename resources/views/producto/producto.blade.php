<x-app-layout>

    <x-slot name="header">
            {!! trans('producto.admin_productos') !!}
    </x-slot>

    <div class="card mb-4">

        <div class="card-body px-0 pt-0 pb-2">
            <div class="row">
                <div class="col m-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!! trans('producto.sku') !!}</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{!! trans('producto.nombre') !!}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!! trans('producto.precio_d') !!}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!! trans('producto.precio_p') !!}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!! trans('producto.puntos') !!}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!! trans('producto.activos') !!}</th>
                                <th class="text-secondary opacity-7"><a
                                        href="{{route('producto.crear')}}"
                                        type="button"
                                        class="btn btn-sm btn-success"
                                    >
                                        {!! trans('producto.agregar') !!}
                                    </a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr @foreach($productos as  $producto) >

                                <td class="align-middle text-left">
                                    <span class="text-secondary text-xs font-weight-bold">{{$producto->sku}}</span>
                                </td>
                                <td class="align-middle text-leftsi ">
                                    <span class="text-secondary text-xs font-weight-bold"><a
                                            href="{{url('admin').'/'.$producto->url}}">{{$producto->nombre}}</a></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{$producto->precio_dolares}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{$producto->precio_pesos}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$producto->puntos}}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$producto->activo}}</span>
                                </td>
                                <td class="align-middle">
                                     <span class="m-3 cursor-pointer"  style="color: red"><i
                                             class="fa fa-close eliminar" data-id="{{$producto->id}}"></i></span>
                                    <a href="{{url('admin/editar').'/'.$producto->id}}"
                                       class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                       data-original-title="Edit user">
                                        {!! trans('producto.editar') !!}
                                    </a>

                                        <span
                                           class="m-3 text-secondary font-weight-bold text-xs activar"  data-id="{{$producto->id}}" data-dato="{{$producto->activo}}" data-toggle="tooltip"
                                           data-original-title="Edit user">
                                             @if($producto->activo == 1)
                                            {!! trans('producto.inactivar') !!}
                                            @else
                                            {!! trans('producto.activar') !!}
                                            @endif
                                        </span>




                                </td>
                            </tr @endforeach>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>

    $(document).ready(() => {
        $(document).on('click', '.eliminar', function () {

            let id = $(this).data('id');
            console.log(id);
            Swal.fire({
                title: "{{ trans('producto.msg_eliminar') }}",
                icon: 'question',
                iconHtml: '?',
                confirmButtonText: "{{ trans('producto.si') }}",
                cancelButtonText: "{{ trans('producto.no') }}",
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.patch("{{route('producto.eliminar')}}", {
                        id
                    })
                        .then(function (res) {

                            window.location = "{{route('producto.index')}}"

                        })
                        .catch(function (err) {
                            console.log(err);
                        })

                }
            })

        })

        $(document).on('click', '.activar', function() {
            let id = $(this).data('id');
            let dato = $(this).data('dato');
            console.log(id)
            let pregunta = "{{trans('producto.msg_inactivar')}}"

            if(dato == 0 ){
                pregunta = "{{trans('producto.msg_activar')}}"
            }

            Swal.fire({
                title: pregunta,
                icon: 'question',
                iconHtml: '?',
                confirmButtonText: "{{ trans('producto.si') }}",
                cancelButtonText: "{{ trans('producto.no') }}",
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.patch("{{route('producto.activarInactivar')}}", {
                        id
                    })
                        .then(function (res) {

                            window.location = "{{route('producto.index')}}"

                        })
                        .catch(function (err) {
                            console.log(err);
                        })

                }
            })

        })
    })


    $('th').click(function() {
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc) {
            rows = rows.reverse()
        }
        for (var i = 0; i < rows.length; i++) {
            table.append(rows[i])
        }
        setIcon($(this), this.asc);
    })

    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index),
                valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
        }
    }

    function getCellValue(row, index) {
        return $(row).children('td').eq(index).html()
    }

    function setIcon(element, asc) {
        $("th").each(function(index) {
            $(this).removeClass("sorting");
            $(this).removeClass("asc");
            $(this).removeClass("desc");
        });
        element.addClass("sorting");
        if (asc) element.addClass("asc");
        else element.addClass("desc");
    }

</script>

<style>
    .asc:after {
        content: ' ↑';
    }

    .desc:after {
        content: " ↓";
    }
</style>

