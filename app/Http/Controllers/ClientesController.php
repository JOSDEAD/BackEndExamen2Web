<?php
namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class ClientesController extends Controller
{
    public function insertarCliente(Request $resquest){
        $cliente=new Cliente();
        $cliente->cedula=$resquest->input('cedula');
        $cliente->nombreCompleto=$resquest->input('nombreCompleto');
        $cliente->save();
        return response()->json(['cliente'=>$cliente],201);
    }
    public function obtenerClientes(){
        $clientes= Cliente::all();
        $response=[
            'clientes'=>$clientes
        ];
        return response()->json($response,200);
    }
    public function modificarCliente(Request $resquest,$id){
        $cliente= Cliente::find($id);
        if(!$cliente){
            return response()->json(['message'=>'Cliente no encontrado'],404);
        }
        $cliente->cedula=$resquest->input('cedula');
        $cliente->nombreCompleto=$resquest->input('nombreCompleto');
        $cliente->save();
        return response()->json(['cliente'=>$cliente],200);
    }
    public function eliminarCliente($id){
        $cliente=Cliente::find($id);
        $cliente->delete();
        return response()->json(['message'=>'Cliente borrado'],200);
    }
}
