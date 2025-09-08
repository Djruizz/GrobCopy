<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LocationGroup;

class LocationGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'Centros de Distribución'],
        ];

        foreach($groups as $group){
            LocationGroup::updateOrCreate($group);
        }
    }
}
