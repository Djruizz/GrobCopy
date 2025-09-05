<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TimelineItem;

class TimelineItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $items = [
            [
                'title' => 'Historia',
                'image' => 'about/timelineImg1.jpg',
                'description' => 
                <<<TEXT
                GOVI, Un Renacer en Monterrey

                En 1980 Grupo GOVI fue fundada por mi padre el Sr. Don Roberto González Villareal.

                Posteriormente decidí enfocar todo el esfuerzo del negocio en la comercialización de partes para la Suspensión Automotriz con el sueño y la necesidad de que los clientes encontraran en una sola parte todos los productos; al haber cumplido este sueño, logramos ser la primer empresa especializada en el Noreste del país dedicada exclusivamente a la venta de partes de Suspensión.

                Contamos con un equipo de profesionales responsables y leales, quienes tienen la consigna de atender y asesorar a Nuestros Clientes de manera rápida y sin errores.

                Juntos crecemos cada día sirviendo a favor de las necesidades de surtido, calidad y rentabilidad, obligándonos a ser cada vez mejores.

                Grupo GOVI es dueño de la marca GROB Suspensión Automotriz y GROB COMFORT Amortiguadores, que nacieron con el objetivo de ofrecer todos los productos en una sola calidad y en un solo envase, cubriendo los estándares de calidad-precio.

                Nuestros clientes nos dan retroalimentación de las necesidades de calidad y éstas son atendidas y resueltas de inmediato por nuestras fábricas. Esto le puede dar al cliente la seguridad que en todo momento va a encontrar en nuestra marca CALIDAD.

                Ahora con la nueva sangre del negocio, Antonio González y sus colaboradores, cada año hacen una revisión de los vehículos ingresados al mercado y de las necesidades de los mismos, para actualizar los nuevos productos sin descuidar los ya existentes, esto garantiza siempre una constante y actualizada EXISTENCIA.

                Sostenemos constantes juntas con los diferentes departamentos para analizar y encontrar procesos fáciles, rápidos y seguros con la finalidad de ofrecer a nuestros clientes un EXCELENTE SERVICIO.

                Edgar González Lozano
                TEXT
            ],
            [
                'title' => 'Misión',
                'image' => 'about/LogoBg.png',
                'description' => 
                <<<TEXT
                Ser Líder de Autopartes de Suspensión, a través de ofrecer Calidad, Existencia y Rapidez.
                TEXT
            ],
            [
                'title' => 'Visión',
                'image' => 'about/LogoBg.png',
                'description' => 
                <<<TEXT
                Contamos con Políticas, Procesos Definidos y Automatizados, para llegar a ser una empresa autoadministrada. Personal Capacitado en sus áreas, en conocimientos del producto, habilidades y actitudes, con enfoque del Servicio al Cliente.
                TEXT
            ],
            [
                'title' => 'Valores',
                'image' => 'about/timelineImg4.jpg',
                'description' => 
                <<<TEXT
                Responsabilidad / Honestidad / Lealtad
                TEXT
            ],
            [
                'title' => 'Se parte de nuestra Historia',
                'image' => '',
                'description' => '',
                'is_final' => true
            ],
        ];

        

        foreach ($items as $item) {
            TimelineItem::updateOrCreate(
                ['title' => $item['title']],
                [
                    'description' => $item['description'],
                    'image' => $item['image'],
                    'is_final' => $item['is_final'] ?? false
                ]
            );
        }
    }
}
