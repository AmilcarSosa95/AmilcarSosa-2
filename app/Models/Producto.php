<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public static function obtenerProductosAdmin()
    {
        $locale = App::getLocale();
        $query = self::join('productos_traducciones as pt', 'pt.id_producto', '=', 'producto.id')
            ->where('pt.idioma', $locale)
            ->select('producto.*', 'pt.nombre', 'pt.url', 'pt.descripcion_corta');

        return $query->get();
    }

    public static function obtenerProductos($params)
    {
        $locale = App::getLocale();
        $query = self::join('productos_traducciones as pt', 'pt.id_producto', '=', 'producto.id')
            ->where('activo', true)
            ->where('pt.idioma', $locale)
            ->select('producto.*', 'pt.nombre', 'pt.url', 'pt.descripcion_corta');

        if (isset($params['clave'])){
            if(is_numeric($params['clave'])){
                $query = $query->where('sku',$params['clave']);
            }else{
                $query = $query->where('pt.nombre','like','%'.$params['clave'].'%');
            }

        }

        if (isset($params['orden'])){
            if (App::currentLocale() == 'en')
            $query = $query->orderBy('precio_dolares',$params['orden']);

            if (App::currentLocale() == 'es')
            $query = $query->orderBy('precio_pesos',$params['orden']);
        }

        return $query->get();
    }

    public static function guardarDatos($params)
    {
        $producto = new Producto;

        if (isset($params['id']) && $params['id'] != null) {
            $producto = self::where('id', $params['id'])->first();
        }

        $producto->sku = $params['sku'];
        $producto->precio_dolares = $params['precio_dolares'];
        $producto->precio_pesos = $params['precio_pesos'];
        $producto->puntos = $params['puntos'];
        $producto->activo = true;

        $producto->save();

        ProductoTraducciones::guardarEspaniol($params, $producto->id);
        ProductoTraducciones::guardarIngles($params, $producto->id);
    }

    public static function obtenerProductoPorID($id)
    {
        $producto = self::where('id', $id)->first();
        $espaniol = ProductoTraducciones::obtenerDatosEspaniol($id);
        $ingles = ProductoTraducciones::obtenerDatosIngles($id);

        $datos = [
            "id" => $producto->id,
            "idEs" => $espaniol->id,
            "nombreEs" => $espaniol->nombre,
            "descripcionCortaEs" => $espaniol->descripcion_corta,
            "descripcionLargaEs" => $espaniol->descripcion_larga,
            "urleEs" => $espaniol->url,
            "idEn" => $ingles->id,
            "nombreEn" => $ingles->nombre,
            "descripcionCortaEn" => $ingles->descripcion_corta,
            "descripcionLargaEn" => $ingles->descripcion_larga,
            "urleEn" => $ingles->url,
            "sku" => $producto->sku,
            "precio_dolares" => $producto->precio_dolares,
            "precio_pesos" => $producto->precio_pesos,
            "puntos" => $producto->puntos
        ];

        return $datos;
    }

    public static function obtenerProductoPorRuta($slug)
    {
        $locale = App::currentLocale();
        $producto = self::join('productos_traducciones as pt', 'pt.id_producto', '=', 'producto.id')
            ->where('pt.url', $slug)
            ->where('pt.idioma', $locale)
            ->select('producto.*', 'pt.*')
            ->first();

        $datos = [
            "id" => $producto->id,
            "nombre" => $producto->nombre,
            "descripcionCorta" => $producto->descripcion_corta,
            "descripcionLarga" => $producto->descripcion_larga,
            "sku" => $producto->sku,
            "precio_dolares" => $producto->precio_dolares,
            "precio_pesos" => $producto->precio_pesos,
            "puntos" => $producto->puntos
        ];

        return $datos;
    }

    public static function activarInactivar(array $parametros)
    {

        $producto = Producto::where('id',$parametros['id'])->first();

        Producto::where('id',$parametros['id'])->update(['activo'=> !$producto->activo]);
    }
}
