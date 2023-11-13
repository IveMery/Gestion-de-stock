@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Editar Sucursal</h2>

        <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Sucursal</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección de la Sucursal</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
