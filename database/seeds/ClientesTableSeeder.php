<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'id_cliente' => 1,
            'nombre' => 'Fernando',
            'email' => 'fernandofernandez@gmail.com',
            'telefono' => '123456789',
            'fecha_contratacion' => date('Y-m-d H:i:s'),
            'notas_contratacion' => 'Este es un cliente que nunca paga',
        ]);
        DB::table('clientes')->insert([
            'id_cliente' => 2,
            'nombre' => 'Rodrigo',
            'email' => 'rodrigorodriguez@gmail.com',
            'telefono' => '123456789',
            'fecha_contratacion' => date('Y-m-d H:i:s'),
            'notas_contratacion' => 'Este tipo paga todos los meses',
        ]);
        DB::table('clientes')->insert([
            'id_cliente' => 3,
            'nombre' => 'Alvaro',
            'email' => 'alvaroalvarez@gmail.com',
            'telefono' => '123456789',
            'fecha_contratacion' => date('Y-m-d H:i:s'),
            'notas_contratacion' => '',
        ]);        
    }
}
