@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Confirmar Eliminación</h2>

        <p>¿Estás seguro de que deseas eliminar el producto?</p>

        <form>
            <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
            <a href="#" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
