<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;

class VentasController extends Controller
{
    public function index() {
        $ventas = Venta::get()->load('cliente');
       // dd($ventas);
        return view("ventas/listado_ventas", compact('ventas'));
    }


    public function create(){
        $clientes = Cliente::all();
        return view('ventas/registrar_venta', compact('clientes'));
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'venta_fecha' => 'required',
        'venta_total' => 'required',
        'cliente_id' => 'required',
    ]);

    // Insertar una nueva venta
    $venta = new Venta();
    $venta->venta_fecha = $request->venta_fecha;
    $venta->venta_total = $request->venta_total;
    $venta->cliente_id = $request->cliente_id;
    $venta->save();

    return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente');
}

 
}
