<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadosController extends Controller
{
    public function get(){
        try {
            $data = Empleados::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
    //metodo guardar
    public function store(Request $request){
        //Instanciacion del modelo
        $Empleados1 = new Empleados();
        $Empleados1->nombre = $request->nombre;
        $Empleados1->apellido = $request->apellido;
        $Empleados1->telefono = $request->telefono;
        $Empleados1->correo = $request->correo;
        $Empleados1->salario = $request->salario;
        $Empleados1->save();
    }
    
    //metodo actualizar
    public function update(Request $request){
        //Buscando el objeto que ya existe
        $Empleados1 = Empleados::findOrfail($request->id);
        $Empleados1->nombre = $request->nombre;
        $Empleados1->apellido = $request->apellido;
        $Empleados1->telefono = $request->telefeno;
        $Empleados1->correo = $request->correo;
        $Empleados1->salario = $request->salario;
        $Empleados1->save();
    }

    //metodo eliminar
    public function delete(Request $request){
        //Buscando objeto a eliminar
        $Empleados1 = Empleados::findOrfail($request->id);
        $Empleados1->delete();
    }

    //metodo mostrar
    public function show(Request $request){
        //Buscar 1 registro
        $Empleados1 = Empleados::findOrfail($request->id);
        if($Empleados1){
            return ['Empleados1'=>$Empleados1];
        }
        return ['No se encontraron datos'];
    }
}