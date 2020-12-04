<?php

namespace Database\Factories;

use App\Models\Receta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Categoria;
use Database\Seeders\CategoriaSeeder;

class RecetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numeroUsuarios = DB::table('users')->count();
        $numeroCategorias = DB::table('categorias')->count();
        return [
            'user_id' =>$this->faker->numberBetween(1, $numeroUsuarios),
            'titulo' => $this->faker->words(2, true),
            'descripcion' => $this->faker->realText(200),
            'costo' => $this->faker->randomFloat(2, 50,500),
            'num_personas' => $this->faker->numberBetween(1,10),
            'imagen' => $this->faker->imageUrl(),
            'likes' => $this->faker->numberBetween(1,10),
            'categoria_id' =>  $this->faker->numberBetween(1, $numeroCategorias),
        ];
    }
}
