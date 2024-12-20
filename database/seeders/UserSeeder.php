<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'test', // Remplacez par le nom de votre utilisateur
            'email' => 'user@example.com', // Remplacez par l'email de votre utilisateur
            'password' => Hash::make('testtest'), // Remplacez par le mot de passe souhaité
        ]);
        User::factory(10)->create();
    }
}
