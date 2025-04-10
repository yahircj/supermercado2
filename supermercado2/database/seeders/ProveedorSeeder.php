<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        $proveedores = [
            [
                'nombre' => 'Distribuidora Alimentos S.A.',
                'ruc' => '20123456789',
                'direccion' => 'Av. Industrial 123, Lima',
                'telefono' => '014567890',
                'email' => 'ventas@dalimentos.com',
                'contacto_nombre' => 'Juan Pérez',
                'contacto_telefono' => '987654321',
                'notas' => 'Entrega en 24 horas',
                'activo' => true
            ],
            [
                'nombre' => 'TecnoImport',
                'ruc' => '20198765432',
                'direccion' => 'Calle Tecnológica 456, Arequipa',
                'telefono' => '012345678',
                'email' => 'contacto@tecnoimport.com',
                'contacto_nombre' => 'María Gómez',
                'contacto_telefono' => '987123456',
                'notas' => 'Solo ventas por mayor',
                'activo' => true
            ],
            [
                'nombre' => 'Ferretería El Constructor',
                'ruc' => '20345678901',
                'direccion' => 'Jr. Herramientas 789, Trujillo',
                'telefono' => '044567890',
                'email' => 'pedidos@elconstructor.com',
                'contacto_nombre' => 'Carlos Rojas',
                'contacto_telefono' => '987456123',
                'notas' => 'Descuentos por volumen',
                'activo' => true
            ],
            [
                'nombre' => 'Insumos Médicos Plus',
                'ruc' => '20678901234',
                'direccion' => 'Av. Salud 101, Chiclayo',
                'telefono' => '074123456',
                'email' => 'info@insumosmedicos.com',
                'contacto_nombre' => 'Luisa Fernández',
                'contacto_telefono' => '987789456',
                'notas' => 'Productos esterilizados',
                'activo' => false
            ]
        ];

        foreach ($proveedores as $proveedor) {
            Proveedor::create($proveedor);
        }

        $this->command->info('¡Proveedores creados exitosamente!');
    }
}