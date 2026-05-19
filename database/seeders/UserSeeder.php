<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Secretary',
            'email' => 'secretary@test.com',
            'password' => Hash::make('123'),
            'role' => 'secretary',
        ]);

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@test.com',
            'password' => Hash::make('456'),
            'role' => 'doctor',
        ]);
    }
}
