<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tareas;

class TareasController extends Controller
{
    public function get(){
        try{
            $data = Tareas::get();
            return response()->json($data, 200);
        }catch(\trhwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    //store
    public function store(Request $request)
    {
        // Instanciacion del modelo
        $Tareas1 = new Tareas();
        $Tareas1->name = $request->name;
        $Tareas1->description = $request->description;
        $Tareas1->state = 'PENDIENTE';
        $Tareas1->save();
    }
    //update
    public function update(Request $request)
    {
        //Buscando el objeto que ya existe
        $Tareas1 = Tareas::findOrfail($request->id);
        $Tareas1->name = $request->name;
        $Tareas1->description = $request->description;
        $Tareas1->save();
    }
    //destroy
    public function destroy(Request $request)
    {
        //Buscando el objeto a eliminar
        $Tareas1 = Tareas::findOrfail($request->id);
        $Tareas1->delete();
    }
    //show
    public function show(Request $request)
    {
        //Buscando 1 registro
        $Tareas1 = Tareas::findOrfail($request->id);
        if ($Tareas1) {
            return ['Tareas1' => $Tareas1];
        }
        return ["No se encontraron datos"];
    }

    //cancelada
    public function cancelada(Request $request)
    {
        $Tareas1 = Tareas::findOrfail($request->id);
        $Tareas1->state = 'CANCELADA';
        $Tareas1->save();
    }

    //completada
    public function completada(Request $request)
    {
        $Tareas1 = Tareas::findOrfail($request->id);
        $Tareas1->state = 'COMPLETADA';
        $Tareas1->save();
    }

    //pendiente
    public function pendiente(Request $request)
    {
        $Tareas1 = Tareas::findOrfail($request->id);
        $Tareas1->state = 'PENDIENTE';
        $Tareas1->save();
    }
}
