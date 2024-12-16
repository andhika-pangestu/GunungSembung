<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@example.com', // Email admin
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'), // Kata sandi default
        ]);
    }
}
