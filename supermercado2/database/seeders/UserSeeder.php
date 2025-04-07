<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@supermercado.com',
            'password' => Hash::make('password'),
            'phone' => '5551234567'
        ]);
        $admin->assignRole('admin');

        // Manager
        $manager = User::create([
            'name' => 'Gerente Alimentos',
            'email' => 'gerente@supermercado.com',
            'password' => Hash::make('password'),
            'phone' => '5557654321'
        ]);
        $manager->assignRole('manager');

        // Employee
        $employee = User::create([
            'name' => 'Empleado Repositor',
            'email' => 'empleado@supermercado.com',
            'password' => Hash::make('password'),
            'phone' => '5559876543'
        ]);
        $employee->assignRole('employee');

        // Customers
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('customer');
        });
    }
}