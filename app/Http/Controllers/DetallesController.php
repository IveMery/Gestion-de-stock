<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetallesController extends Controller
{
    public function index() {
        $detalles = DetalleVenta::get();
       // dd($productos);
        return view("detalles/listado_detalle_ventas", compact('detalles'));
    }
}
