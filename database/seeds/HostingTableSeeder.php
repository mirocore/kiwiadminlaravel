<?php

use Illuminate\Database\Seeder;

class HostingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Hosting::create([
            'id_hosting' => 1,
            'nombre_hosting' => 'Hostinger',
            'importe_hosting' => 500,
        ]);
        \App\Models\Hosting::create([
            'id_hosting' => 2,
            'nombre_hosting' => 'Hostinga',
            'importe_hosting' => 700,
        ]);        
    }
}
