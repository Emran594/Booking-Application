<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        Location::create(['name' => 'Dhaka']);
        Location::create(['name' => 'Cumilla']);
        Location::create(['name' => 'Chittagong']);
        Location::create(['name' => 'Coxs Bazar']);
        Location::create(['name' => 'Sylhet']);
        Location::create(['name' => 'Khulna']);
        Location::create(['name' => 'Rajshahi']);
        Location::create(['name' => 'Mymensing']);
        Location::create(['name' => 'Rangpur']);
    }
}
