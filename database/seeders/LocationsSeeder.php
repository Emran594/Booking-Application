<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        // List of all districts (zillas) in Bangladesh
        $districts = [
            'Bagerhat', 'Bandarban', 'Barguna', 'Barisal', 'Bhola', 
            'Bogura', 'Brahmanbaria', 'Chandpur', 'Chapai Nawabganj', 
            'Chattogram', 'Chuadanga', 'Cox\'s Bazar', 'Cumilla', 
            'Dhaka', 'Dinajpur', 'Faridpur', 'Feni', 'Gaibandha', 
            'Gazipur', 'Gopalganj', 'Habiganj', 'Jamalpur', 'Jashore', 
            'Jhalokati', 'Jhenaidah', 'Joypurhat', 'Khagrachari', 
            'Khulna', 'Kishoreganj', 'Kurigram', 'Kushtia', 'Lakshmipur', 
            'Lalmonirhat', 'Madaripur', 'Magura', 'Manikganj', 'Meherpur', 
            'Moulvibazar', 'Munshiganj', 'Mymensingh', 'Naogaon', 
            'Narail', 'Narayanganj', 'Narsingdi', 'Natore', 
            'Netrokona', 'Nilphamari', 'Noakhali', 'Pabna', 
            'Panchagarh', 'Patuakhali', 'Pirojpur', 'Rajbari', 
            'Rajshahi', 'Rangamati', 'Rangpur', 'Satkhira', 
            'Shariatpur', 'Sherpur', 'Sirajganj', 'Sunamganj', 
            'Sylhet', 'Tangail', 'Thakurgaon'
        ];
    
        foreach ($districts as $district) {
            Location::create(['name' => $district]);
        }
    }
}
