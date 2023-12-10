@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Registrar Nuevo Producto</h2>

        <form id="product-form" action="{{ url('/productos') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio">
                @error('precio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sucursal" class="form-label">Sucursal</label>
                <select class="form-select" id="sucursal" name="sucursal">
                    @foreach($sucursales as $sucursal)
                        <option value="{{ $sucursal->sucursal_id }}">{{ $sucursal->sucursal_nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock">
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrar Producto</button>
        </form>
    </div>
   
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("product-form").addEventListener("submit", function (event) {
            var nombre = document.getElementById("nombre").value;
            var precio = document.getElementById("precio").value;
            var stock = document.getElementById("stock").value;

            if (nombre.trim() === "" || isNaN(precio) || precio < 0 || isNaN(stock) || stock < 0) {
                alert("Por favor, ingrese datos válidos en todos los campos.");
                event.preventDefault();
            }
        });
    });
</script>

@endsection

