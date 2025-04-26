<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plot;
use Carbon\Carbon;

class PlotSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $plots = [
            // Available plots
            ['plot_number' => 'P001', 'location' => 'Gaborone', 'size' => 500, 'status' => 'available', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P002', 'location' => 'Francistown', 'size' => 600, 'status' => 'available', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P003', 'location' => 'Maun', 'size' => 700, 'status' => 'available', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P004', 'location' => 'Kasane', 'size' => 800, 'status' => 'available', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P005', 'location' => 'Serowe', 'size' => 900, 'status' => 'available', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],

            // Unavailable plots
            ['plot_number' => 'P006', 'location' => 'Nata', 'size' => 500, 'status' => 'unavailable', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P007', 'location' => 'Selebe Phikwe', 'size' => 600, 'status' => 'unavailable', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P008', 'location' => 'Mahalapye', 'size' => 700, 'status' => 'unavailable', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P009', 'location' => 'Tonota', 'size' => 800, 'status' => 'unavailable', 'user_id' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];

        \App\Models\Plot::insert($plots);
    } 
} 