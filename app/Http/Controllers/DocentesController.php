<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Docentes;

class DocentesController extends Controller
{
    public function get(){
        try {
            $data = Docentes::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function store(Request $request){
        $Docente1 = new Docentes();
        $Docente1->nombre = $request->nombre;
        $Docente1->apellido = $request->apellido;
        $Docente1->telefono = $request->telefono;
        $Docente1->estado = 'CONTRATADO';
        $Docente1->save();
    }

    public function update(Request $request){
        $Docente1 = Docentes::findOrfail($request->id);
        $Docente1->nombre = $request->nombre;
        $Docente1->apellido = $request->apellido;
        $Docente1->telefono = $request->telefono;
        $Docente1->estado = 'CONTRATADO';
        $Docente1->save();
    }

    public function delete(Request $request){
        $Docente1 = Docentes::findOrfail($request->id);
        $Docente1->delete();
    }

    public function show(Request $request){
        $Docente1 = Docentes::findOrfail($request->id);
        if($Docente1){
            return ['Docente1'=>$Docente1];
        }
        return ['No se encontraron datos'];
    }

    public function activate(Request $request){
        $Docente1 = Docentes::findOrfail($request->id);
        $Docente1->estado = 'CONTRATADO';
        $Docente1->save();
    }

    public function deactivate(Request $request){
        $Docente1 = Docentes::findOrfail($request->id);
        $Docente1->estado = 'DESPEDIDO';
        $Docente1->save();
    }
}