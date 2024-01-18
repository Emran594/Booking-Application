<?php
// SeatsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatsSeeder extends Seeder
{
    public function run()
    {
        // Seed seats
        Seat::create(['name' => 'A1', 'bus_id' => 1]);
        Seat::create(['name' => 'A2', 'bus_id' => 1]);
        Seat::create(['name' => 'A3', 'bus_id' => 1]);
        Seat::create(['name' => 'A4', 'bus_id' => 1]);
    }
}
