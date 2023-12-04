@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Editar Producto</h2>

        <form action="{{ route('productos.update', $producto->producto_id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="{{ $producto->producto_nombre }}">
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio"
                    value="{{ $producto->producto_precio }}">
            </div>

            <div class="mb-3">
                <label for="sucursal" class="form-label">Sucursal</label>
                <select class="form-select" id="sucursal" name="sucursal">
                    @foreach ($sucursales as $sucursal)
                        <option value="{{ $sucursal->sucursal_id }}"
                            {{ optional($sucursalActual)->sucursal_id == $sucursal->sucursal_id ? 'selected' : '' }}>
                            {{ $sucursal->sucursal_nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock"
                        value="{{ $producto->producto_stock }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
