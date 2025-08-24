<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Prueba',
                'text' => 'Prueba de texto para el servicio.',
                'icon' => null
            ],
            [
                'title' => 'Calidad',
                'text' => 'Nuestros proveedores son fabricantes de equipo original, cuentan con los más altos estándares de Calidad y son avalados con diferentes certificados de procesos y medio ambiente.',
                'icon' => 'check'
            ],
            [
                'title' => 'Garantía',
                'text' => 'La calidad de nuestros productos GROB está garantizada contra defectos de fabricación por 1 año en partes de Suspensión, Dirección, Tracción Delantera, 3 años en Amortiguadores Service y garantía de por vida en Amortiguadores GROB.',
                'icon' => 'shield'
            ],
            [
                'title' => 'Entrega',
                'text' => 'Entregamos a Domicilio en menos de 1 hora en Mostrador, 4 horas en Mayoreo Local y de 24 a 48 horas a Foráneos.',
                'icon' => 'clock'
            ],
            [
                'title' => 'Cobertura',
                'text' => 'Contamos con cobertura en toda la República Mexicana a través de nuestros 10 Centros de Distribución y más de 80 Sucursales.',
                'icon' => 'globe'
            ],
            [
                'title' => 'Desarrollo',
                'text' => 'Somos Innovadores y Vanguardistas, contamos con procesos que nos permiten desarrollar Aplicaciones de autos de reciente modelo en tiempo récord.',
                'icon' => 'zap'
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                [
                    'description' => $service['text'],
                    'icon' => $service['icon']
                ]
            );
        }
    }
}
