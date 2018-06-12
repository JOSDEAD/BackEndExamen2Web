<?php
namespace App\Http\Controllers;
use App\Factura;
use App\ProductoFactura;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FacturasController extends Controller
{

    public function insertarFactura(Request $resquest){
        $factura=new Factura();
        $factura->cliente=$resquest->input('cliente');
        $factura->fecha=$resquest->input('fecha');
        $factura->montoTotal=$resquest->input('montoTotal');
        $factura->subTotal=$resquest->input('subTotal');
        $factura->impuestos=$resquest->input('impuestos');
        $factura->save();

        if((count($request->input('productos'))>0) &&  !is_null($request->input('productos')[0])  ){
            $productos = $request->input('productos');
            foreach ($productos as $producto){
                ProductoFactura::create(array('idFactura' =>  $factura->id, 
                'identificadorProducto' =>  $producto));
            }
        }

        return response()->json(['factura'=>$factura],201);

    }
    public function obtenerfactura(){
        $factura = Factura::all();
        $facturas=  DB::table('facturas')
        ->leftjoin('productos', 'facturas.identificadorProducto', '=', 'productos.identificador')
        ->select('facturas.*', 'productos.nombre', 'productos.precio','productos.impuesto')
        ->get();

        $response=[
            'facturas'=>$facturas
        ];
        return response()->json($response,200);
    }
    public function modificarFactura(Request $resquest,$id){
        $factura= Factura::find($id);
        if(!$factura){
            return response()->json(['message'=>'factura no encontrado'],404);
        }
        $factura->identificador=$resquest->input('identificador');
        $factura->identificadorProducto=$resquest->input('identificadorProducto');
        $factura->cantidad=$resquest->input('cantidad');
        $factura->cantidadMaxima=$resquest->input('cantidadMaxima');
        $factura->cantidadMinima=$resquest->input('cantidadMinima');
        $factura->gravado=$resquest->input('gravado');
        $factura->save();
        return response()->json(['factura'=>$factura],200);
    }
    public function eliminarFactura($id){
        $factura=Factura::find($id);
        $factura->delete();
        return response()->json(['message'=>'factura borrado'],200);
    }
}
