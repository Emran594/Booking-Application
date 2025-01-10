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
            [
                'bus_name' => 'Hino 18',
                'model' => 'Model 143',
                'driver_name' => 'Kamrul',
                'phone' => '123-456-7890',
            ],
            [
                'bus_name' => 'Volvo X1',
                'model' => 'Model 200',
                'driver_name' => 'Sujon',
                'phone' => '987-654-3210',
            ],
            [
                'bus_name' => 'Scania M10',
                'model' => 'Model 300',
                'driver_name' => 'Rafiq',
                'phone' => '456-789-0123',
            ],
            [
                'bus_name' => 'Mercedes V1',
                'model' => 'Model 400',
                'driver_name' => 'Naser',
                'phone' => '654-321-0987',
            ],
            [
                'bus_name' => 'Isuzu A3',
                'model' => 'Model 500',
                'driver_name' => 'Mamun',
                'phone' => '789-012-3456',
            ],
            [
                'bus_name' => 'Ashok Leyland T4',
                'model' => 'Model 600',
                'driver_name' => 'Sadiq',
                'phone' => '321-654-9870',
            ],
            [
                'bus_name' => 'Tata Express',
                'model' => 'Model 700',
                'driver_name' => 'Imran',
                'phone' => '890-123-4567',
            ],
            [
                'bus_name' => 'Man Lion',
                'model' => 'Model 800',
                'driver_name' => 'Shahid',
                'phone' => '234-567-8901',
            ],
            [
                'bus_name' => 'Higer A7',
                'model' => 'Model 900',
                'driver_name' => 'Jabed',
                'phone' => '567-890-1234',
            ],
            [
                'bus_name' => 'Yutong Pro',
                'model' => 'Model 1000',
                'driver_name' => 'Rashid',
                'phone' => '678-901-2345',
            ],
        ]);
    }
}
