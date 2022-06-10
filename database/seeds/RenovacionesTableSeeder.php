<?php

use Illuminate\Database\Seeder;

class RenovacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Renovacion::create([
            'id_renovacion' => 1,
            'id_trabajo' => 1,
            'notas_renovacion' => 'El cliente avisó que puede llegar a tardar con el pago unos 5 días',
            'id_hosting' => 1,
            'id_dominio' => 1,
            'id_ssl' => 1,
        ]);
        \App\Models\Renovacion::create([
            'id_renovacion' => 2,
            'id_trabajo' => 2,
            'id_hosting' => 2,
            'id_dominio' => 2,
        ]);        
    }
}
