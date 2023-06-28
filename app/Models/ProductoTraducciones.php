<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTraducciones extends Model
{
    use HasFactory;
    protected $table = 'productos_traducciones';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function guardarEspaniol($params, $idProducto)
    {
        $productoTraduccion = new ProductoTraducciones;

        if (isset($params['idEs']) && $params['idEs'] != null){
            $productoTraduccion=self::where('id',$params['idEs'])->first();
        }

        $productoTraduccion->id_producto = $idProducto;
        $productoTraduccion->nombre = $params['nombreEs'];
        $productoTraduccion->descripcion_corta = $params['descripcionCortaEs'];
        $productoTraduccion->descripcion_larga = $params['descripcionLargaEs'];
        $productoTraduccion->url = $params['sku'].'_'.$params['nombreEs'];
        $productoTraduccion->idioma = "es";

        $productoTraduccion->save();
    }

    public static function guardarIngles($params, $idProducto)
    {
        $productoTraduccion = new ProductoTraducciones;

        if (isset($params['idEn']) && $params['idEn'] != null){
            $productoTraduccion=self::where('id',$params['idEn'])->first();
        }

        $productoTraduccion->id_producto = $idProducto;
        $productoTraduccion->nombre = $params['nombreEn'];
        $productoTraduccion->descripcion_corta = $params['descripcionCortaEn'];
        $productoTraduccion->descripcion_larga = $params['descripcionLargaEn'];
        $productoTraduccion->url = $params['sku'].'_'.$params['nombreEn'];
        $productoTraduccion->idioma = "en";

        $productoTraduccion->save();
    }

    public static function obtenerDatosEspaniol($id)
    {
        $dato = self::where('id_producto',$id)->where('idioma','es')->first();
        return $dato;
    }
    public static function obtenerDatosIngles($id)
    {
        $dato = self::where('id_producto',$id)->where('idioma','en')->first();
        return $dato;
    }
}
