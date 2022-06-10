<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Usuario::create([
            'nombre' => 'Ramiro',
            'apellido' => 'Belcore',
            'email' => 'belcore@gmail.com',
            'password' => Hash::make('somoskiwi')
        ]);
        \App\Models\Usuario::create([
            'nombre' => 'Aquiles',
            'apellido' => 'Vaesa',
            'email' => 'aquilesvaesa@gmail.com',
            'password' => Hash::make('somoskiwi')
        ]);
        \App\Models\Usuario::create([
            'nombre' => 'Susana',
            'apellido' => 'Horia',
            'email' => 'susanahoria@gmail.com',
            'password' => Hash::make('somoskiwi')
        ]); 
    }
}
