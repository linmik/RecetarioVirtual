<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function recetas()
    {
        return $this->belongsToMany(Receta::class);
    }

}
