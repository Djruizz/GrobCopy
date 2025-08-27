<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Family;

class FamilySeeder extends Seeder
{
    public function run()
    {
        // Relación: categoría -> familias
        $data = [
            'Suspensión' => [
                'Abrasadera',
                'Amortiguadores',
                'Barras',
                'Bases de amortiguador',
                'Bujes',
                'Elevador de barra de torsión',
                'Excéntricos',
                'Gomas estabilizadoras',
                'Horquilla',
                'Hules de tirante',
                'Pasadores',
                'Resortes',
                'Rótula',
                'Topes de amortiguador',
                'Tornillos estabilizadores',
            ],
            'Tracción Delantera' => [
                'Balero',
                'Balero doble',
                'Cubre polvo',
                'Juntas V.C',
                'Mazas de rueda 1a. generación',
                'Mazas de rueda 2a. generación',
                'Mazas de rueda 3a. generación',
                'Trípodes',
            ],
            'Dirección' => [
                'Brazo auxiliar',
                'Brazo pitman',
                'Cremalleras',
                'Cubre polvo',
                'Gomas de cremallera',
                'Pernos',
                'Terminales',
                'Tubo unión',
                'Varilla',
                'Varilla lateral',
                'Vieletas',
            ],
            'Soportes' => [
                'Soporte motor',
                'Soporte motor (torsión)',
                'Soporte transmisión',
            ],
        ];

        foreach ($data as $categoryName => $families) {
            // Buscar la categoría existente
            $category = Category::where('name', $categoryName)->first();

            if (!$category) {
                // Si no existe, saltar o lanzar error (según prefieras)
                $this->command->warn("⚠️ Categoría '{$categoryName}' no encontrada, se omite.");
                continue;
            }

            $order = 1;

            foreach ($families as $familyName) {
                $imageName = strtolower(
                    str_replace(
                        [' ', '.', 'á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'],
                        ['_', '', 'a', 'e', 'i', 'o', 'u', 'n', 'a', 'e', 'i', 'o', 'u', 'n'],
                        $familyName
                    )
                ) . '.jpg';

                Family::updateOrCreate(
                    [
                        'name' => $familyName,
                        'category_id' => $category->id,
                    ],
                    [
                        'image_url' => $categoryName . '/' . $imageName,
                        'order' => $order++,
                    ]
                );
            }
        }
    }
}
