<?php

namespace Database\Seeders;

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
            'name' => 'Admin',               // Nombre del usuario
            'email' => 'admin@gmail.com',  // Email del usuario
            'password' => Hash::make('12345678'),  // Contraseña hasheada
            'dni' => '10101010',             // Agrega otros campos que requieras en tu tabla users
            'ruc' => '12345678901',          // RUC o campos adicionales
            'celular' => '987654321',        // Número de celular
            'rol' => '1',                    // 1 para indicar que es Administrador (ajustado según tu estructura)
            'email_verified_at' => now(),    // Marca el email como verificado
        ]);
    }
}
