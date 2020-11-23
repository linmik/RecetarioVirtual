<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'receta_id',
        'titulo',
        'descripcion'
    ];

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}
