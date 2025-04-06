<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    public function run(): void
    {
        // Insertar los valores de estatus
        DB::table('estatus')->insert([
            ['nombre' => 'Procesando'],
            ['nombre' => 'Enviado'],
            ['nombre' => 'Entregado']
        ]);
    }
}
