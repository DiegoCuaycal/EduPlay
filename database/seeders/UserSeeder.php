<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario admin
        $admin = User::create([
            'id' => 4,
            'name' => 'admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'rol' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Asignar rol usando Spatie
        $admin->assignRole('admin');
    }
}


