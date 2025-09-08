<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['sucursal'=>'Ciudad de México', 'lat'=>'19.4326', 'lng'=> '-99.1332', 'location_group_id'=> 1]
        ];

        foreach($locations as $location){
            Location::updateOrCreate($location);
        }
    }
}
