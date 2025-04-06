<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PedidosSeeder extends Seeder
{
    public function run()
    {
        // Crear 5 pedidos con estado "Entregado"
        for ($i = 0; $i < 5; $i++) {
            $pedido = Pedido::create([
                'cliente_id' => 1,  // Cliente con ID 1
                'direccion' => 'Calle ' . Str::random(10),
                'correo' => 'cliente1@example.com',
                'telefono' => '5551234567',
                'nombres' => 'Cliente Uno',
                'apellidos' => 'Apellido Uno',
                'codigo_postal' => '12345',
                'total' => rand(100, 500),
                'estatus' => 'Entregado',  // Estado "Entregado"
            ]);

            // Asociar productos a este pedido
            $this->asociarProductos($pedido);
        }

        // Crear 5 pedidos con estado "Procesando" o "Enviado"
        for ($i = 0; $i < 5; $i++) {
            $pedido = Pedido::create([
                'cliente_id' => 1,  // Cliente con ID 1
                'direccion' => 'Calle ' . Str::random(10),
                'correo' => 'cliente1@example.com',
                'telefono' => '5551234567',
                'nombres' => 'Cliente Uno',
                'apellidos' => 'Apellido Uno',
                'codigo_postal' => '12345',
                'total' => rand(100, 500),
                'estatus' => $i % 2 == 0 ? 'Procesando' : 'Enviado',  // Alternar entre "Procesando" y "Enviado"
            ]);

            // Asociar productos a este pedido
            $this->asociarProductos($pedido);
        }
    }

    // Función para asociar productos a un pedido
    private function asociarProductos($pedido)
    {
        // Seleccionar algunos productos aleatorios (por ejemplo, 3 productos por pedido)
        $productos = \App\Models\Producto::inRandomOrder()->take(3)->get();

        // Asociar los productos seleccionados al pedido
        $pedido->productos()->attach($productos);
    }
}
