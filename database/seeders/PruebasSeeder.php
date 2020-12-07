<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class PruebasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaSeeder ::class);
        $this->call(UserSeeder::class);
        $this->call(RecetaSeeder::class);
        #
    }
}
