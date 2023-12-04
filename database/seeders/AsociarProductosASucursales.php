<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsociarProductosASucursales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        for ($productoId = 1; $productoId <= 100; $productoId++) {
            DB::table('productosucursales')->insert([
                'producto_id' => $productoId,
                'sucursal_id' => rand(1, 3), 
            ]);
        }
    }
}
