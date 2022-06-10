<?php

use Illuminate\Database\Seeder;

class TrabajosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trabajos')->insert([
            'id_trabajo' => 1,
            'nombre' => 'CL Etiquetas y Logo',
            'descripcion' => 'Diseño de etiquetas para productos de limpieza. Diseño de logotipo de marca.',
            'estado' => 'nuevo',
            'fecha_contratacion' => date("Y-m-d H:i:s"),
            'fecha_alta' => date("Y-m-d H:i:s"),
            'id_cliente' => 1,
        ]);
        DB::table('trabajos_tienen_servicios')->insert([
            'id_trabajo' => 1,
            'id_servicio' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('trabajos_tienen_servicios')->insert([
            'id_trabajo' => 1,
            'id_servicio' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);  
        DB::table('trabajos_tienen_servicios')->insert([
            'id_trabajo' => 1,
            'id_servicio' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);          
        DB::table('trabajos')->insert([
            'id_trabajo' => 2,
            'nombre' => 'Cabañas San Francisco',
            'descripcion' => 'Diseño de landing page con galería de imágenes',
            'estado' => 'nuevo',
            'fecha_contratacion' => date("Y-m-d H:i:s"),
            'fecha_alta' => date("Y-m-d H:i:s"),         
            'id_cliente' => 2,
        ]);
        DB::table('trabajos')->insert([
            'id_trabajo' => 3,
            'nombre' => 'Dashboard',
            'descripcion' => 'Diseño de landing page con boton de whatsapp',
            'estado' => 'cancelado',
            'fecha_contratacion' => date("Y-m-d H:i:s"),
            'fecha_alta' => date("Y-m-d H:i:s"),          
            'id_cliente' => 3,
        ]);        
    }
}
