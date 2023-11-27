@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Registrar Nuevo Producto</h2>

        <form action="{{ url('/productos') }}" method="POST">
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
                    <option value="sucursal1">Sucursal 1</option>
                    <option value="sucursal2">Sucursal 2</option>
                    <option value="sucursal3">Sucursal 3</option>
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
@endsection

