<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Activity;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(PlotSeeder::class);

        Activity::create([
            'user_id' => 1, // Replace with a valid user ID
            'description' => 'Admin logged in',
        ]);
    }
}
