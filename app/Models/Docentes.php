<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    use HasFactory;

    protected $filable = ['nombre', 'apellido', 'telefono', 'estado'];

    public function setNombreAttribute($value){
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function setApellidoAttribute($value){
        $this->attributes['apellido'] = strtoupper($value);
    }
}