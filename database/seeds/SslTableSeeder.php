<?php

use Illuminate\Database\Seeder;

class SslTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ssl::create([
            'id_ssl' => 1,
            'importe_ssl' => 200,
        ]);
    }
}
