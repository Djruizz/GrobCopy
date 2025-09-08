<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LocationPhone;

class PhonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phones = [
            ['phone'=>"55 1234 5678", 'location_id'=> 1],
            ['phone'=>"55 8765 4321", 'location_id'=> 1],
        ];

        foreach($phones as $phone){
            LocationPhone::updateOrCreate($phone);
        }

    }
}
