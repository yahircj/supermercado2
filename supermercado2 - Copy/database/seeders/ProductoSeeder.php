<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = ['Lácteos', 'Bebidas', 'Abarrotes', 'Carnes', 'Verduras', 'Frutas', 'Panadería', 'Limpieza', 'Higiene', 'Snacks'];

        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            Producto::create([
                'nombre' => ucfirst($faker->words(2, true)),
                'descripcion' => $faker->sentence(12),
                'precio' => $faker->randomFloat(2, 5, 200),
                'stock' => $faker->numberBetween(0, 100),
                'imagen' => 'producto_' . $faker->numberBetween(1, 10) . '.jpg', // simulación de imagenes
                'categoria' => $faker->randomElement($categorias),
            ]);
        }
    }
}
