<?php
namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class ProductosController extends Controller
{
    public function insertarProducto(Request $resquest){
        $producto=new Producto();
        $producto->identificador=$resquest->input('identificador');
        $producto->nombre=$resquest->input('nombre');
        $producto->impuesto=$resquest->input('impuesto');
        $producto->precio=$resquest->input('precio');
        $producto->save();
        return response()->json(['producto'=>$producto],201);
    }
    public function obtenerProductos(){
        $productos= Producto::all();
        $response=[
            'productos'=>$productos
        ];
        return response()->json($response,200);
    }
    public function modificarProducto(Request $resquest,$id){
        $producto= Producto::find($id);
        if(!$producto){
            return response()->json(['message'=>'producto no encontrado'],404);
        }
        $producto->identificador=$resquest->input('identificador');
        $producto->nombre=$resquest->input('nombre');
        $producto->impuesto=$resquest->input('impuesto');
        $producto->precio=$resquest->input('precio');
        $producto->save();
        return response()->json(['producto'=>$producto],200);
    }
    public function eliminarProducto($id){
        $producto=Producto::find($id);
        $producto->delete();
        return response()->json(['message'=>'producto borrado'],200);
    }
}
