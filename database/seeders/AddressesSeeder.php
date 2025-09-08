<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            ['street' => 'Av. Reforma',
            'number' => '123',
            'neighborhood' => 'Villa Fontana Residencial',
            'zip_code' => '06600',
            'city' => 'Tlajo',
            'state' => 'CDMX',
            'location_id'=> 1]
        ];

        foreach($addresses as $address){
            Address::updateOrCreate($address);
        }
    }
}
