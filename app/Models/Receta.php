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

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function recetas()
    {
        return $this->hasMany(Proceso::class);
    }

    public function ingredientes()
    {
        return $this->hasMany(Ingrediente::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
