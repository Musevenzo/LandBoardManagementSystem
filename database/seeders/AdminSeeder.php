<?php

namespace Database\Seeders;

use App\Models\User;  // Add this line
use Illuminate\Support\Facades\Hash;  // Add this line
use App\Enums\UserRole;  // Add this if you have an enum
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "role" => UserRole::Admin,
            'password' => Hash::make("123456789")  
        ]);
    }
}
