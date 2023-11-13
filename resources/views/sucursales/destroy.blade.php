@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Confirmar Eliminación de Sucursal</h2>

        <p>¿Estás seguro de que deseas eliminar esta sucursal?</p>

        <form action="{{ route('sucursales.destroy', $sucursal->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Eliminar Sucursal</button>
            <a href="{{ route('sucursales.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
