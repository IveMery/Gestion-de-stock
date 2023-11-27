<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
  
    public function index(Request $request) {
        $nombre = $request->input('nombre');

        $productos = Producto::when(true, function ($query) use ($nombre) {
            $query->where('producto_nombre', 'like', '%' . $nombre . '%');
        })->get();
        return view("productos/dashboard", compact('productos')); 
    }


    public function create(){
        return view("productos/register_product");
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);

       //insertar un nuevo producto
        $producto = new Producto();
        $producto->producto_nombre = $request->nombre;
        $producto->producto_precio = $request->precio;
        $producto->producto_stock = $request->stock;
        $producto->save();
       
        return redirect()->route('productos.index')->with('success', 'Producto registrado exitosamente');
    }   

    public function update(){
        return view("productos/update_product");
    }

    public function destroy(){
        return view("productos/delete_product");
    }
}