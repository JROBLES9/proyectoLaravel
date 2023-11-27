<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $filable = ['nombre', 'capacidad', 'estado'];

    public function setNombreAttribute($value){
        $this->attributes['nombre'] = strtoupper($value);
    }
}