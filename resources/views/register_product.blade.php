@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Registrar Nuevo Producto</h2>

        <form>
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
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
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad">
            </div>

            <div class="mb-3">
                <label for="precio_venta" class="form-label">Precio Venta</label>
                <input type="text" class="form-control" id="precio_venta" name="precio_venta">
            </div>

            <button type="submit" class="btn btn-primary">Registrar Producto</button>
        </form>
    </div>
@endsection
