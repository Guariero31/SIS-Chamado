<?php

namespace Database\Seeders;

use App\Enum\TipoUsuario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Evandro Vasques',
            'email' => 'evandro@acto.com.br',
            'password' => Hash::make('123'),
            'telefone' => '11987654321',
            'tipo_usuario' => TipoUsuario::ADMIN,
        ]);
    }
}
