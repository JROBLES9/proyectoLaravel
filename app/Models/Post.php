<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //atributos a llenar o acceder en la base de datos
    protected $fillable = ['title', 'description', 'completed'];

    //Mutador es aquel que puede cambiar el valor original de algo
    public function setTitleAttribute($value){
        $this->attributes['title'] = strtoupper($value);
    }

    public function getDescriptionAttribute($value){
        return ucfirst($value);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
