<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BussSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buss')->insert([
            'bus_name' => 'Hino Volbo',
            'model' => 'Model H-2359',
            'driver_name' => 'Kamruzzaman',
            'phone' => '123-456-7890',
        ]);
        DB::table('buss')->insert([
            'bus_name' => 'Atlas Hero',
            'model' => 'Jht598',
            'driver_name' => 'Akkas Mia',
            'phone' => '987-654-3210',
        ]);
    }
}
