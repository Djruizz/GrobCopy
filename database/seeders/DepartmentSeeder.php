<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['department_name' => 'Ventas', 'email' => 'emailsendertest31@gmail.com'],
            ['department_name' => 'Soporte', 'email' => 'djruizp31@gmail.com'],
            ['department_name' => 'Calidad', 'email' => 'ruizd31100779@gmail.com']
        ];
        foreach ($departments as $department) {
            Department::updateOrCreate($department);
        }
    }
}
