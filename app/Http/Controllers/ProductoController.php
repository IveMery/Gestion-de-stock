<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'sucursal' => 'required|exists:sucursales,sucursal_id',
            'stock' => 'required|numeric|min:0',
        ]);

        //insertar un nuevo producto
        $producto = new Producto();
        $producto->producto_nombre = $request->nombre;
        $producto->producto_precio = $request->precio;
        $producto->producto_stock = $request->stock;
        $producto->save();

        $producto->productosSucursales()->create([
            'sucursal_id' => $request->sucursal,
        ],[
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no debe tener más de :max caracteres.',
            
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.min' => 'El campo precio debe ser al menos :min.',
            
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'sucursal.exists' => 'La sucursal seleccionada no es válida.',
            
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'stock.min' => 'El campo stock debe ser al menos :min.',
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
    try {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'sucursal' => 'required|exists:sucursales,sucursal_id',
            'stock' => 'required|integer|min:0',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no debe tener más de :max caracteres.',
            
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.min' => 'El campo precio debe ser al menos :min.',
            
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'sucursal.exists' => 'La sucursal seleccionada no es válida.',
            
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'stock.min' => 'El campo stock debe ser al menos :min.',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update([
            'producto_nombre' => $request->nombre,
            'producto_precio' => $request->precio,
            'producto_stock' => $request->stock,
        ]);

        $producto->productosSucursales()->update(['sucursal_id' => $request->sucursal]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
    } catch (\Exception $e) {
        return redirect()->route('productos.index')->with('error', 'Error al actualizar el producto. Por favor, inténtelo de nuevo.');
    }
}


    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->productosSucursales()->delete();
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}
