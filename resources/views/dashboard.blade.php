<x-app-layout>

    <x-slot name="header">
        {!! trans('producto.inicio') !!}
    </x-slot>

    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <h5 class="font-weight-bolder mb-0">
                        {{trans('producto.bienvenida')}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
