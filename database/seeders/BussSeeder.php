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
            'bus_name' => 'Hino 18',
            'model' => 'Model 143',
            'driver_name' => 'Kamrul',
            'phone' => '123-456-7890',
        ]);
    }
}
