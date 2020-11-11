<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario',
        'titulo',
        'descripcion',
        'costo',
        'num_personas',
        'imagen',
        'categoria'
    ];
}
