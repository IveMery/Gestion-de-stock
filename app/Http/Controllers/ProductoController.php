<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Sucursal;

class ProductoController extends Controller
{

    public function index(Request $request)
    {
        $nombre = $request->input('nombre');

        $productos = Producto::when(true, function ($query) use ($nombre) {
            $query->where('producto_nombre', 'like', '%' . $nombre . '%');
        })->with('productosSucursales.sucursal')->get();

        return view("productos/dashboard", compact('productos'));
    }


    public function create()
    {
        $sucursales = Sucursal::all();
        //dd($sucursales);
        return view("productos/register_product", compact('sucursales'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'precio' => 'required',
            'sucursal' => 'required',
            'stock' => 'required',
        ]);

        //insertar un nuevo producto
        $producto = new Producto();
        $producto->producto_nombre = $request->nombre;
        $producto->producto_precio = $request->precio;
        $producto->producto_stock = $request->stock;
        $producto->save();

        $producto->productosSucursales()->create([
            'sucursal_id' => $request->sucursal,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto registrado exitosamente');
    }



    public function edit($id)
    {
        $producto = Producto::with('productosSucursales')->find($id);
        $sucursales = Sucursal::all();
        $sucursalActual = optional($producto->productosSucursales->first())->sucursal_id;
        return view('productos.edit', compact('producto', 'sucursales', 'sucursalActual'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'precio' => 'required',
            'sucursal' => 'required',
            'stock' => 'required',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->producto_nombre = $request->nombre;
        $producto->producto_precio = $request->precio;
        $producto->producto_stock = $request->stock;
        $producto->save();

        $producto->productosSucursales()->update(['sucursal_id' => $request->sucursal]);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }


    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->productosSucursales()->delete();
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}
