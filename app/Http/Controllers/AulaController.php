<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aula;

class AulaController extends Controller
{
    public function get(){
        try {
            $data = Aula::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }


    public function store(Request $request){
        $Aula1 = new Aula();
        $Aula1->nombre = $request->nombre;
        $Aula1->capacidad = $request->capacidad;
        $Aula1->estado = 'DISPONIBLE';
        $Aula1->save();
    }

    public function update(Request $request){
        $Aula1 = Aula::findOrfail($request->id);
        $Aula1->nombre = $request->nombre;
        $Aula1->capacidad = $request->capacidad;
        $Aula1->estado = 'DISPONIBLE';
        $Aula1->save();
    }

    public function delete(Request $request){
        $Aula1 = Aula::findOrfail($request->id);
        $Aula1->delete();
    }

    public function show(Request $request){
        $Aula1 = Aula::findOrfail($request->id);
        if($Aula1){
            return ['Aula1'=>$Aula1];
        }
        return ['No se encontraron datos'];
    }

    public function activate(Request $request){
        $Aula1 = Aula::findOrfail($request->id);
        $Aula1->estado = 'DISPONIBLE';
        $Aula1->save();
    }

    public function deactivate(Request $request){
        $Aula1 = Aula::findOrfail($request->id);
        $Aula1->estado = 'OCUPADO';
        $Aula1->save();
    }
}