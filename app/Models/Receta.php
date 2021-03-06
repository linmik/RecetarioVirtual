<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'titulo',
        'descripcion',
        'costo',
        'num_personas',
        'imagen',
        'categoria_id'
    ];

    public function getTituloAttribute($value){
        return ucwords(strtolower($value));
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function procesos()
    {
        return $this->hasMany(Proceso::class);
    }

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class)->withPivot('cantidad');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Usuarios_likes()
    {
        return $this->belongsToMany(User::class,'likes');
    }

    public function Numero_likes()
    {
        return $this->belongsToMany(User::class,'likes')->count();
    }
}
