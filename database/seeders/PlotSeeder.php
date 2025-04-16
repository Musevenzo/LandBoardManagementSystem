<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PlotSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Clear the table
        DB::table('plots')->truncate();

        // Available plots
        $availablePlots = [
            ['plot_number' => 'P001', 'location' => 'Gaborone', 'size' => 500, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P002', 'location' => 'Francistown', 'size' => 600, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P003', 'location' => 'Maun', 'size' => 700, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P004', 'location' => 'Kasane', 'size' => 800, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P005', 'location' => 'Serowe', 'size' => 900, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
        ];

        // Allocated plots
        $allocatedPlots = [
            ['plot_number' => 'P006', 'location' => 'Tutume', 'size' => 500, 'status' => 'allocated', 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P007', 'location' => 'Nate', 'size' => 600, 'status' => 'allocated', 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P008', 'location' => 'Phikwe', 'size' => 700, 'status' => 'allocated', 'created_at' => $now, 'updated_at' => $now],
            ['plot_number' => 'P009', 'location' => 'Tonota', 'size' => 800, 'status' => 'allocated', 'created_at' => $now, 'updated_at' => $now],
        ];

        // Insert plots into the database
        Plot::insert(array_merge($availablePlots, $allocatedPlots));
    }
}
