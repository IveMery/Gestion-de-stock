@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Listado de Sucursales</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{ url('/sucursales/update') }}" class="btn btn-primary">Editar</a>
                        <a href="{{ url('/sucursales/destroy') }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="{{ url('/sucursales/create') }}" class="btn btn-success">Registrar Nueva Sucursal</a>
    </div>
@endsection
