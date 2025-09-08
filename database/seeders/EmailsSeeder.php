<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LocationEmail;


class EmailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = [
            ['email'=>"contacto@empresa.com", 'location_id'=> 1],
            ['email'=>"contacto@ejemplo.com", 'location_id'=> 1],
        ];

        foreach($emails as $email){
            LocationEmail::updateOrCreate($email);
        }
    }
}
