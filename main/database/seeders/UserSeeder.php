<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name'     => 'Administrador',
                'password' => '12345678',
                'role'     => 'admin',
            ]
        );
        User::updateOrCreate(
            ['email' => 'joao.silva@test.com'],
            [
                'name'     => 'João Silva',
                'password' => '12345678',
                'role'     => 'student',
            ]
        );
    }
}
