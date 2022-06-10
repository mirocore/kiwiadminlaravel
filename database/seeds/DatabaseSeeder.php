<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuariosTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(TrabajosTableSeeder::class);
        $this->call(SubtrabajosTableSeeder::class);
        $this->call(PagosTableSeeder::class);
        $this->call(CobrosTableSeeder::class);
        $this->call(HostingTableSeeder::class);
        $this->call(DominioTableSeeder::class);
        $this->call(SslTableSeeder::class);
        $this->call(RenovacionesTableSeeder::class);
    }
}
