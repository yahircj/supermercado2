<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $food = Department::where('name', 'Alimentos')->first();
        $cleaning = Department::where('name', 'Limpieza')->first();

        Category::create([
            'department_id' => $food->id,
            'name' => 'Lácteos',
            'description' => 'Leche, quesos, yogures',
            'status' => 'active'
        ]);

        Category::create([
            'department_id' => $food->id,
            'name' => 'Enlatados',
            'description' => 'Alimentos en conserva',
            'status' => 'active'
        ]);

        Category::create([
            'department_id' => $cleaning->id,
            'name' => 'Detergentes',
            'description' => 'Productos para lavar ropa',
            'status' => 'active'
        ]);
    }
}