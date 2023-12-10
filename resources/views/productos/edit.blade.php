@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Editar Producto</h2>

        <form id="editarProductoForm" action="{{ route('productos.update', $producto->producto_id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="{{ $producto->producto_nombre }}" required>
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" pattern="\d+(\.\d{1,2})?" title="Por favor, ingrese un número válido con hasta dos decimales"
                    value="{{ $producto->producto_precio }}" required>
                @error('precio')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sucursal" class="form-label">Sucursal</label>
                <select class="form-select" id="sucursal" name="sucursal" required>
                    @foreach ($sucursales as $sucursal)
                        <option value="{{ $sucursal->sucursal_id }}"
                            {{ optional($sucursalActual)->sucursal_id == $sucursal->sucursal_id ? 'selected' : '' }}>
                            {{ $sucursal->sucursal_nombre }}
                        </option>
                    @endforeach
                </select>
                @error('sucursal')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock"
                    value="{{ $producto->producto_stock }}" required>
                @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("editarProductoForm").addEventListener("submit", function (event) {
                var nombre = document.getElementById("nombre").value;
                var precio = document.getElementById("precio").value;
                var sucursal = document.getElementById("sucursal").value;
                var stock = document.getElementById("stock").value;

                if (nombre.trim() === "" || isNaN(precio) || precio < 0 || isNaN(sucursal) || isNaN(stock) || stock < 0) {
                    alert("Por favor, ingrese datos válidos en todos los campos.");
                    event.preventDefault();
                }
                
            });
        });
    </script>
@endsection
