<?php
namespace App\Http\Controllers;
use App\Inventario;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InventariosController extends Controller
{

    public function insertarInventario(Request $resquest){
        $inventario=new Inventario();
        $inventario->identificador=$resquest->input('identificador');
        $inventario->identificadorProducto=$resquest->input('identificadorProducto');
        $inventario->cantidad=$resquest->input('cantidad');
        $inventario->cantidadMaxima=$resquest->input('cantidadMaxima');
        $inventario->cantidadMinima=$resquest->input('cantidadMinima');
        $inventario->gravado=$resquest->input('gravado');
        $inventario->save();
        return response()->json(['inventario'=>$inventario],201);
    }
    public function obtenerInventario(){
        
        $inventarios=  DB::table('inventarios')
        ->leftjoin('productos', 'inventarios.identificadorProducto', '=', 'productos.identificador')
        ->select('inventarios.*', 'productos.nombre', 'productos.precio','productos.impuesto')
        ->get();

        $response=[
            'inventarios'=>$inventarios
        ];
        return response()->json($response,200);
    }
    public function modificarInventario(Request $resquest,$id){
        $inventario= Inventario::find($id);
        if(!$inventario){
            return response()->json(['message'=>'inventario no encontrado'],404);
        }
        $inventario->identificador=$resquest->input('identificador');
        $inventario->identificadorProducto=$resquest->input('identificadorProducto');
        $inventario->cantidad=$resquest->input('cantidad');
        $inventario->cantidadMaxima=$resquest->input('cantidadMaxima');
        $inventario->cantidadMinima=$resquest->input('cantidadMinima');
        $inventario->gravado=$resquest->input('gravado');
        $inventario->save();
        return response()->json(['inventario'=>$inventario],200);
    }
    public function eliminarInventario($id){
        $inventario=Inventario::find($id);
        $inventario->delete();
        return response()->json(['message'=>'inventario borrado'],200);
    }
}
