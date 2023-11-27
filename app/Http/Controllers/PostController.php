<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function get(){
        try {
            $data = Post::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
    //metodo guardar
    public function store(Request $request){
        //Traer las variables correctamente
        //Instanciacion del modelo
        $Post1 = new Post();
        $Post1->title = $request->titulo;
        $Post1->description = $request->descripcion;
        $Post1->completed = 'PENDIENTE';
        $Post1->save();
    }
    
    //metodo actualizar
    public function update(Request $request){
        //Buscando el objeto que ya existe
        $Post1 = Post::findOrfail($request->id);
        $Post1->title = $request->title;
        $Post1->description = $request->description;
        $Post1->completed = $request->completed;
        $Post1->save();
    }

    //metodo desactivar post
    public function deactivate(Request $request){
        //Buscando el objeto que ya existe
        $Post1 = Post::findOrfail($request->id);
        $Post1->completed = 'PENDIENTE';
        $Post1->save();
    }

    //metodo desactivar post
    public function activate(Request $request){
        //Buscando el objeto que ya existe
        $Post1 = Post::findOrfail($request->id);
        $Post1->completed = 'COMPLETADO';
        $Post1->save();
    }

    //metodo eliminar
    public function delete(Request $request){
        //Buscando objeto a eliminar
        $Post1 = Post::findOrfail($request->id);
        $Post1->delete();
    }

    //metodo mostrar
    public function show(Request $request){
        //Buscar 1 registro
        $Post1 = Post::findOrfail($request->id);
        if($Post1){
            return ['Post1'=>$Post1];
        }
        return ['No se encontraron datos'];
    }
}
