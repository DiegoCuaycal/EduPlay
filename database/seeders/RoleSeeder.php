<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'guard_name' => 'web', // Asegúrate de incluir este campo
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
            'guard_name' => 'web', // Incluye este campo también
        ]);

        // Agrega más roles según necesites, asegurándote de incluir 'guard_name'
    }
}
