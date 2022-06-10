<?php

use Illuminate\Database\Seeder;

class DominioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Dominio::create([
            'id_dominio' => 1,
            'nombre_dominio' => 'www.fafafa.com.ar',
            'importe_dominio' => 600,
        ]);
        \App\Models\Dominio::create([
            'id_dominio' => 2,
            'nombre_dominio' => 'www.zaraza.com.ar',
            'importe_dominio' => 800,
        ]);        
    }
}
