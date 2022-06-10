<?php

use Illuminate\Database\Seeder;

class SubtrabajosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\Subtrabajo::create([
           'id_subtrabajo' => 1, 
           'id_trabajo' => 1, 
           'nombre_subtrabajo' => 'Recargo extra', 
           'importe_subtrabajo' => 1000, 
       ]);
       \App\Models\Subtrabajo::create([
           'id_subtrabajo' => 2, 
           'id_trabajo' => 1, 
           'nombre_subtrabajo' => '10 Etiquetas para imprimir', 
           'importe_subtrabajo' => 3000, 
       ]);
        \App\Models\Subtrabajo::create([
           'id_subtrabajo' => 3, 
           'id_trabajo' => 1, 
           'nombre_subtrabajo' => 'Diseño de Logo', 
           'importe_subtrabajo' => 1000, 
       ]);
       \App\Models\Subtrabajo::create([
           'id_subtrabajo' => 4, 
           'id_trabajo' => 2, 
           'nombre_subtrabajo' => 'Ultra recargo', 
           'importe_subtrabajo' => 3000, 
       ]);
       \App\Models\Subtrabajo::create([
           'id_subtrabajo' => 5, 
           'id_trabajo' => 3, 
           'nombre_subtrabajo' => 'Recargito', 
           'importe_subtrabajo' => 100, 
       ]);        
    }
}
