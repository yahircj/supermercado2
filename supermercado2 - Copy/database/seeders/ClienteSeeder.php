<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        DB::table('clientes')->insert([
            'nombre' => 'Alfredo Perez',
            'correo' => 'miridian95@hotmail.com',
            'telefono' => '448214314134',
            'direccion' => 'Dirección de ejemplo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
