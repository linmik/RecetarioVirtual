<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $fillable = [
       'nombre'
    ];

    public $timestamps = false;

    public function recetas()
    {
        return $this->belongsToMany(Receta::class)->withPivot('cantidad');
    }

    public function setNombreAttribute($value){
        return $this->attributes['nombre'] = ucfirst($value);
    }

}
