<x-app-layout>

    <x-slot name="header">
        {!! trans('producto.det_product') !!}
    </x-slot>

    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="card-header">{!! trans('producto.inf_produc') !!}</div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col">
                            <div>
                                <label style="font-weight: bold;" for="nombreEs">{!! trans('producto.nombre') !!}</label>
                                <p style="font-size: small;">{{$producto['nombre']}}</p>
                            </div>
                            <div>
                                <label style="font-weight: bold;" for="descripcionCortaEs">{!! trans('producto.desc_corta') !!}</label>
                                <p style="font-size: small;">{{$producto['descripcionCorta']}}</p>
                            </div>
                            <div>
                                <label style="font-weight: bold;" for="descripcionLargaEs">{!! trans('producto.desc_larga') !!}</label>
                                <p style="font-size: small;">{{$producto['descripcionLarga']}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <label style="font-weight: bold;" for="sku">{!! trans('producto.sku') !!}</label>
                                <p style="font-size: small;">{{$producto['sku']}}</p>
                            </div>

                            <div>
                                <label style="font-weight: bold;" for="precio_dolares">{!! trans('producto.precio_d') !!}</label>
                                <p style="font-size: small;">{{$producto['precio_dolares']}}</p>
                            </div>
                            <div>
                                <label style="font-weight: bold;" for="precio_pesos">{!! trans('producto.precio_p') !!}</label>
                                <p style="font-size: small;">{{$producto['precio_pesos']}}</p>
                            </div>
                            <div>
                                <label style="font-weight: bold;" for="puntos">{!! trans('producto.puntos') !!}</label>
                                <p style="font-size: small;">{{$producto['puntos']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card mb-3">
                <div class="card-header">MXN</div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col">
                            <canvas id="pesos" height="100px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card mb-3">
                <div class="card-header">US</div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col">
                            <canvas id="dolares" height="100px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">MXN/US</div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-12">
                    <canvas id="myChart" height="100px"></canvas>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">

    const DATA_COUNT = 6;
    const NUMBER_CFG = {count: DATA_COUNT, min:0};

    const labels = [];
    const dolares = [];
    const pesos = [];

    for (let i = 0; i <= DATA_COUNT; ++i) {
        multiplo = i * 2
        labels.push(i.toString());

        dolares.push(multiplo > 0 ? (({{$producto['precio_dolares']}}/100 )*multiplo)+{{$producto['precio_dolares']}}  : {{$producto['precio_dolares']}});

        pesos.push(multiplo > 0 ? (({{$producto['precio_pesos']}}/100 )*multiplo)+{{$producto['precio_pesos']}}  : {{$producto['precio_pesos']}});
    }

    const data = {
        labels: labels,
        datasets: [
            {
                label: "{{ trans('producto.precio_p') }}",
                backgroundColor: 'rgb(20,170,215)',
                borderColor: 'rgb(17,215,223)',
                data: pesos,
            },
            {
                label: "{{ trans('producto.precio_d') }}",
                backgroundColor: 'rgb(37,135,16)',
                borderColor: 'rgb(131,193,23)',
                data: dolares,
            }
        ]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );


    const dataPesos = {
        labels: labels,
        datasets: [
            {
                label: "{{ trans('producto.precio_p') }}",
                backgroundColor: 'rgb(20,170,215)',
                borderColor: 'rgb(17,215,223)',
                data: pesos,
            }]
    };

    const configPesos = {
        type: 'bar',
        data: dataPesos,
        options: {}
    };

    const myChartPesos = new Chart(
        document.getElementById('pesos'),
        configPesos
    );


    const dataDolares = {
        labels: labels,
        datasets: [
            {
                label: "{{ trans('producto.precio_d') }}",
                backgroundColor: 'rgb(37,135,16)',
                borderColor: 'rgb(131,193,23)',
                data: dolares,
            }]
    };

    const configDolares = {
        type: 'bar',
        data: dataDolares,
        options: {}
    };

    const myChartDolares = new Chart(
        document.getElementById('dolares'),
        configDolares
    );

</script>
