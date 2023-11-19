<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertarClientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            ['cliente_nombre' => 'Ivette Mery', 'cliente_fono' => 777777777],
            ['cliente_nombre' => 'Ana Barraxa', 'cliente_fono' => 888888888],
            ['cliente_nombre' => 'Cristobal Peluso', 'cliente_fono' => 99999999],
        ]);
        
    }
}
