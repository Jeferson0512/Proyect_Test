<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\medico;

class MedicoController extends Controller
{
  public function index(){
    /*
    $medicoList = medico::all();
    $medicos = response()->json($medicoList);
    return $medicos;
    */
    //$medicoList = DB::table('medicos')->where('id',1)->orderBy("nombre")->get();
    $medicoList = medico::where('id',1)->orderBy("nombre")->get();
    return $medicoList;
  }

  public function update(){
    
  }


}
