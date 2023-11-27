<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscripciones;

class InscripcionesController extends Controller
{
    public function get(){
        try {
            $data = Inscripciones::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
    //metodo guardar
    public function store(Request $request){
        //Instanciacion del modelo
        $Inscripciones1 = new Inscripciones();
        $Inscripciones1->id = $request->id;
        $Inscripciones1->fecha_inscripcion = $request->fecha_inscripcion;
        $Inscripciones1->tipo_inscripcion = $request->route('tipo');
        $Inscripciones1->save();
    }
    
    //metodo actualizar
    public function update(Request $request){
        //Buscando el objeto que ya existe
        $Inscripciones1 = Inscripciones::findOrfail($request->id);
        $Inscripciones1->fecha_inscripcion = $request->fecha_inscripcion;
        $Inscripciones1->tipo_inscripcion = $request->tipo_inscripcion;
        $Inscripciones1->save();
    }

    //metodo eliminar
    public function delete(Request $request){
        //Buscando objeto a eliminar
        $Inscripciones1 = Inscripciones::findOrfail($request->id);
        $Inscripciones1->delete();
    }

    //metodo mostrar
    public function show(Request $request){
        //Buscar 1 registro
        $Inscripciones1 = Inscripciones::findOrfail($request->id);
        if($Inscripciones1){
            return ['Inscripciones1'=>$Inscripciones1];
        }
        return ['No se encontraron datos'];
    }
}