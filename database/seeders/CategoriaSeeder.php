<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre' => 'Comida Mexicana']);
        Categoria::create(['nombre' => 'Bebida']);
        Categoria::create(['nombre' => 'Postre']);
        Categoria::create(['nombre' => 'Aperitivo']);
        Categoria::create(['nombre' => 'Vegetariano']);
    }
}
