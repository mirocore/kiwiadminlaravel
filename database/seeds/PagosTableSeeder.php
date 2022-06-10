<?php

use Illuminate\Database\Seeder;

class PagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pago::create([
            'id_pago' => 1,
            'id_trabajo' => 1,
            'id_usuario' => 1,
            'fecha_pago' => date("Y-m-d H:i:s"),
            'notas_pago' => '',
            'importe_pago'    => '1000',
            'estado_pago' => 'si'
        ]);
        \App\Models\Pago::create([
            'id_pago' => 2,
            'id_trabajo' => 1,
            'id_usuario' => 2,
            'fecha_pago' => date("Y-m-d H:i:s"),
            'notas_pago' => '',
            'importe_pago'    => '1000',
            'estado_pago' => 'no'
        ]);
        \App\Models\Pago::create([
            'id_pago' => 3,
            'id_trabajo' => 2,
            'id_usuario' => 1,
            'fecha_pago' => date("Y-m-d H:i:s"),
            'notas_pago' => '',
            'importe_pago'    => '500',
            'estado_pago' => 'no'
        ]);        
    }
}
