@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Registrar Nueva Sucursal</h2>

        <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Sucursal</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección de la Sucursal</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>

            <button type="submit" class="btn btn-primary">Registrar Sucursal</button>
        </form>
    </div>
@endsection
