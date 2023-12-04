@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Editar Sucursal</h2>

        <form action="{{ route('sucursales.update', $sucursal->sucursal_id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Sucursal</label>
                <input type="text" class="form-control" id="nombre" name="nombre"  value="{{ $sucursal->sucursal_nombre }}">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección de la Sucursal</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $sucursal->sucursal_direccion }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
