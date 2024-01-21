<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        // Seed locations
        Location::create(['name' => 'Dhaka']);
        Location::create(['name' => 'Cumilla']);
        Location::create(['name' => 'Chittagong']);
        Location::create(['name' => 'Cox,s bazar']);
        Location::create(['name' => 'Mymensings']);
        Location::create(['name' => 'Gazipur']);
        Location::create(['name' => 'Rajshahi']);
        Location::create(['name' => 'Khulna']);
    }
}
