<?php
namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'name' => 'Alimentos',
            'description' => 'Productos alimenticios básicos',
            'status' => 'active'
        ]);

        Department::create([
            'name' => 'Limpieza',
            'description' => 'Productos de limpieza del hogar',
            'status' => 'active'
        ]);

        Department::create([
            'name' => 'Electrónica',
            'description' => 'Dispositivos electrónicos',
            'status' => 'active'
        ]);
    }
}