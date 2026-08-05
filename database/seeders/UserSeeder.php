<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->firstOrCreate(
            ['email' => 'admin@educore.com'],
            [
                'name' => 'Administrador',
                'phone' => '71999999999',
                'password' => 'Ab123456#@',
            ],
        );

        $admin->syncRoles('administrador');
    }
}
