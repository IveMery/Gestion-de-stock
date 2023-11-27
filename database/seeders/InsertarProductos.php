<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class InsertarProductos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) { 
            DB::table('productos') -> insert([
                'producto_nombre' => 'Producto ' . $i,
                'producto_precio' => rand(10, 100),
                'producto_stock' => rand(1, 50),
            ]);
        }
    }
}
