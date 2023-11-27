@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Dashboard</h1>
         <!-- Formulario de búsqueda -->
         <form action="{{ url('productos') }}" method="GET" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <a class="btn btn-primary" href="{{ url('productos/create') }}">Registrar nuevo producto</a>
        <a class="btn btn-secondary" href="{{ url('/sucursales') }}">Ver sucursales</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    {{-- <th>Sucursal</th> --}}
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->producto_id }}</td>
                        <td>{{ $producto->producto_nombre }}</td>
                        <td>{{ $producto->producto_precio }}</td>
                        <td>{{ $producto->producto_stock }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('productos/update') }}">Editar</a>
                            <a class="btn btn-danger" href="{{ url('productos/destroy') }}">Eliminar</a>
                         
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@stop
