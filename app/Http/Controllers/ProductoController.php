<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\throwException;

class ProductoController extends Controller
{


    public function index(): View
    {
        $productos = \App\Models\Producto::obtenerProductosAdmin();
        return view('producto.producto', ['productos' => $productos]);
    }

    public function crear(): View
    {
        return view('producto.FormularioProducto');
    }

    public function editar($id): View
    {

        $producto = Producto::obtenerProductoPorID($id);
        return view('producto.EditarProducto', ['producto' => $producto]);
    }

    public function detalle($slug): View
    {
        $producto = Producto::obtenerProductoPorRuta($slug);
        return view('producto.DetalleProducto', ['producto' => $producto]);
    }

    public function detallePublico($slug): View
    {
        $producto = Producto::obtenerProductoPorRuta($slug);
        return view('producto.DetallePublico', ['producto' => $producto]);
    }

    /**
     * @throws ValidationException
     */
    public function guardar(Request $request)
    {

        try {

            $validation = \Validator::make($request->all(), [
                "nombreEs" => 'required|regex:/^[a-zA-Z0-9-]+$/',
                "descripcionCortaEs" => 'required|max:120',
                "descripcionLargaEs" => '',
                "nombreEn" => 'required',
                "descripcionCortaEn" => 'required|max:120',
                "descripcionLargaEn" => '',
                "sku" => 'required|numeric|unique:producto',
                "precio_dolares" => 'required|numeric|min:1',
                "precio_pesos" => 'required|numeric|min:1',
                "puntos" => 'required|numeric|min:1',
            ]);
            if (!$validation->passes()) {
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }


            Producto::guardarDatos($request->all());
            return redirect('/admin/producto');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return Redirect::back()->withInput()->withErrors([trans('validation.mesg_error_validate',['attribute' => 'ProductoController:guardar']),$ex->getMessage()]);
        }

    }

    public function modificar(Request $request)
    {
        try {
            $validation = \Validator::make($request->all(), [
                "nombreEs" => 'required|regex:/^[a-zA-Z0-9-]+$/',
                "descripcionCortaEs" => 'required|max:120',
                "descripcionLargaEs" => '',
                "nombreEn" => 'required',
                "descripcionCortaEn" => 'required|max:120',
                "descripcionLargaEn" => '',
                "sku" => 'required|numeric|unique:producto,id,'.$request->all()['id'],
                "precio_dolares" => 'required|numeric|min:1',
                "precio_pesos" => 'required|numeric|min:1',
                "puntos" => 'required|numeric|min:1',
            ]);
            if (!$validation->passes()) {
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }

            Producto::guardarDatos($request->all());
            return redirect('/admin/producto');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return Redirect::back()->withInput()->withErrors($ex->getMessage());
        }

    }

    public function eliminar(Request $request)
    {
        try{
        $parametros = $request->all();

        Producto::where('id', $parametros['id'])->delete();
        return json_encode([]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return Redirect::back()->withInput()->withErrors($ex->messages());
        }
    }

    public function activarInactivar(Request $request)
    {
        try {
            $parametros = $request->all();

            Producto::activarInactivar($parametros);

            return json_encode([]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }

    }

    public function productos(Request $request)
    {
        $productos = \App\Models\Producto::obtenerProductos($request->all());
        return view('producto.productos', ['productos' => $productos]);
    }

    public function cambio(Request $request)
    {
        $params = $request->all();
        $cantidadCambio = self::obtenrCambioMoneda();
        return round($params['cantidad'] * $cantidadCambio, 2);
    }

    public function cambioADolar(Request $request)
    {
        try{
        $params = $request->all();

        $cantidadCambio = self::obtenrCambioMoneda();

        return round($params['cantidad'] / $cantidadCambio, 2);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return json_encode([
                'status' => 500,
                'message' => 'Error',
                'data' => null
            ]);
        }
    }


    private static function obtenrCambioMoneda()
    {
        try{
        $client = new Client(['verify' => false,]);
        $response = $client->request(
            'GET',
            'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?token=e9f07a50f01595b783294aa90616d0603e5db7095535e5d5ccb704f2e805c465',
            ['header' => ['bmx-token' => 'e9f07a50f01595b783294aa90616d0603e5db7095535e5d5ccb704f2e805c465']]);

        $respuesta = json_decode($response->getBody()->getContents());

        $cantidadCambio = $respuesta->bmx->series[0]->datos[0]->dato;

        return $cantidadCambio;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}
