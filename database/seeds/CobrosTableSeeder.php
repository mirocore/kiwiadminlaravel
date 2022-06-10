<?php

use Illuminate\Database\Seeder;

class CobrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cobro::create([
            'id_cobro' => 1,
            'id_trabajo' => 1,
            'fecha_cobro' => date("Y-m-d H:i:s"),
            'notas_cobro' => 'Seña del cliente',
            'importe_cobro'    => '1000'
        ]);
        \App\Models\Cobro::create([
            'id_cobro' => 2,
            'id_trabajo' => 1,
            'fecha_cobro' => date("Y-m-d H:i:s"),
            'notas_cobro' => '',
            'importe_cobro'    => '1000'
        ]);        
        \App\Models\Cobro::create([
            'id_cobro' => 3,
            'id_trabajo' => 2,
            'fecha_cobro' => date("Y-m-d H:i:s"),
            'notas_cobro' => 'Ésto pagó tarde',
            'importe_cobro'    => '1000'
        ]);       
        \App\Models\Cobro::create([
            'id_cobro' => 4,
            'id_trabajo' => 3,
            'fecha_cobro' => date("Y-m-d H:i:s"),
            'notas_cobro' => 'Seña del cliente',
            'importe_cobro'    => '50'
        ]);        
    }
}
