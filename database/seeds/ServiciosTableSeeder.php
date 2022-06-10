<?php

use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            'id_servicio' => 1,
            'nombre' => 'Maquetado de Landing Page',
            'precio' => 2000,
            'descripcion' => 'Sitio de una sóla página con formulario y botón de Whatsapp',
        ]);
        DB::table('servicios')->insert([
            'id_servicio' => 2,
            'nombre' => 'Diseño de Logotipo',
            'precio' => 2000,
            'descripcion' => 'Diseño de logo entregado en todos los formatos. No incluye guía de diseño.',
        ]);
        DB::table('servicios')->insert([
            'id_servicio' => 3,
            'nombre' => 'Diseño de identidad gráfica',
            'precio' => 4000
        ]);        
    }
}
