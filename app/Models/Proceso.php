<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}
