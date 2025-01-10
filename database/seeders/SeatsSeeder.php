<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatsSeeder extends Seeder
{
    public function run()
    {
        $seatsPerBus = 40;
        $busIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    
        // Loop through each bus
        foreach ($busIds as $busId) {
            for ($i = 1; $i <= $seatsPerBus; $i++) {
                $seatName = 'A' . $i;
                Seat::create(['name' => $seatName, 'bus_id' => $busId]);
            }
        }
    }
}
