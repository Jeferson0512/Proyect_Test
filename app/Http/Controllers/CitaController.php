<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index(){
      $CitaList = Cita::all();
      $Cita = response()->json($CitaList);

      return $Cita;

    }

    public function store(Request $request)
    {
        try
        {
            if(!$request->has('id') || !$request->has('fecha'))
            {
                throw new \Exception('Se esperaba campos mandatorios');
            }

        $producto = new Producto();
        $producto->estado = $request->get('estado');
        $producto->duracion = $request->get('duracion');
        $producto->fecha = $request->get('fecha');
        $producto->servicio = $request->get('servicio');

    		$producto->save();

    	    return response()->json(['type' => 'success', 'message' => 'Registro completo'], 200);

        }catch(\Exception $e)
        {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

}
