<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class AdminsSeeder extends Seeder
{
    public function run()
    {
        Users::create([
            'name' => 'Admin CV Nazma',
            'email' => 'admin@cvnazma.com',
            'password' => Hash::make('admin12345'), // Ganti dengan password yang aman
            'role' => 'admin',
        ]);
    }
}