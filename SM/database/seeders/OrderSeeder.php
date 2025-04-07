<?php
namespace Database\Seeders;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // 1. Verificar que existan productos
        if (Product::count() === 0) {
            $this->command->info('No hay productos disponibles. Creando algunos...');
            $this->call(ProductSeeder::class);
        }

        // 2. Obtener o crear un cliente con dirección
        $customer = User::role('customer')->first();
        
        if (!$customer) {
            $this->command->info('No hay clientes disponibles. Creando uno...');
            $customer = User::factory()->create();
            $customer->assignRole('customer');
        }

        // 3. Crear dirección si no existe
        if ($customer->addresses()->count() === 0) {
            Address::create([
                'user_id' => $customer->id,
                'street' => 'Calle Falsa 123',
                'ext_number' => '101',
                'int_number' => null,
                'neighborhood' => 'Centro',
                'city' => 'Ciudad de México',
                'state' => 'CDMX',
                'postal_code' => '06000',
                'is_default' => true
            ]);
            $this->command->info('Dirección creada para el cliente.');
        }

        // 4. Crear la orden
        $order = Order::create([
            'user_id' => $customer->id,
            'address_id' => $customer->addresses()->first()->id,
            'total' => 0,
            'status' => 'delivered'
        ]);

        // 5. Añadir productos a la orden
        $products = Product::limit(2)->get();
        
        foreach ($products as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => rand(1, 3),
                'unit_price' => $product->price,
                'subtotal' => $product->price * rand(1, 3)
            ]);
        }

        // 6. Actualizar el total
        $order->update([
            'total' => $order->items()->sum('subtotal')
        ]);

        $this->command->info("Orden #{$order->id} creada exitosamente.");
    }
}