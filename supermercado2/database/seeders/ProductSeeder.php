<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $dairy = Category::where('name', 'Lácteos')->first();
        $canned = Category::where('name', 'Enlatados')->first();
        $detergents = Category::where('name', 'Detergentes')->first();

        Product::create([
            'category_id' => $dairy->id,
            'name' => 'Leche Entera 1L',
            'description' => 'Leche entera pasteurizada',
            'price' => 25.50,
            'stock' => 100,
            'stock_min' => 20,
            'sku' => 'LM001',
            'status' => 'active'
        ]);

        Product::create([
            'category_id' => $dairy->id,
            'name' => 'Queso Gouda 250g',
            'description' => 'Queso gouda en rebanadas',
            'price' => 45.75,
            'stock' => 50,
            'stock_min' => 15,
            'sku' => 'QG002',
            'status' => 'active'
        ]);

        Product::create([
            'category_id' => $canned->id,
            'name' => 'Atún en Agua 140g',
            'description' => 'Atún en lata al agua',
            'price' => 18.90,
            'stock' => 8, // Stock bajo para probar alertas
            'stock_min' => 10,
            'sku' => 'AT003',
            'status' => 'active'
        ]);

        Product::create([
            'category_id' => $detergents->id,
            'name' => 'Detergente líquido 2L',
            'description' => 'Detergente para ropa',
            'price' => 65.00,
            'stock' => 30,
            'stock_min' => 5,
            'sku' => 'DT004',
            'status' => 'active'
        ]);
    }
}