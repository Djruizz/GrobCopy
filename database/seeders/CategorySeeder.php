<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Suspensión', 'order' => 1],
            ['name' => 'Tracción Delantera', 'order' => 2],
            ['name' => 'Dirección', 'order' => 3],
            ['name' => 'Soportes', 'order' => 4],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
