<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InsertarSucursales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sucursales')->insert([
            ['sucursal_nombre' => 'Santiago', 'sucursal_direccion' => 'Toesca 12'],
            ['sucursal_nombre' => 'La Serena', 'sucursal_direccion' => 'Alberto Solari 209'],
            ['sucursal_nombre' => 'Arica', 'sucursal_direccion' => 'Coloso 208'],
        ]);
    }
}
