<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Producto;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::get();
        // dd($ventas);
        return view("sucursales/index", compact('sucursales'));
    }

    public function create()
    {
        $sucursales = Sucursal::all();
        return view('sucursales/create', compact('sucursales'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        $sucursal = new Sucursal();
        $sucursal->sucursal_nombre = $request->nombre;
        $sucursal->sucursal_direccion = $request->direccion;
        $sucursal->save();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal registrada exitosamente');
    }

    public function edit($id)
    {
        $sucursal = Sucursal::with('productoSucursal')->find($id);
        $productos = Producto::all();
        $productosAsociados = $sucursal->productoSucursal;

        return view('sucursales.edit', compact('sucursal', 'productos', 'productosAsociados'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'direccion' => 'required'
        ]);

        $sucursal = Sucursal::findOrFail($id);
        $sucursal->sucursal_nombre = $request->nombre;
        $sucursal->sucursal_direccion = $request->direccion;
        $sucursal->save();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada exitosamente');
    }

    public function destroy($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->productoSucursal()->delete();
        $sucursal->delete();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal eliminada exitosamente');
    }
}
