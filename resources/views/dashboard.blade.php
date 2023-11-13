@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Dashboard</h1>

        <a class="btn btn-primary" href="{{ url('/register_product') }}">Registrar nuevo producto</a>
        <a class="btn btn-secondary" href="{{ url('/sucursales') }}">Ver sucursales</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Sucursal</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Venta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a class="btn btn-warning" href="{{ url('/update_product') }}">Editar</a>
                        <a class="btn btn-danger" href="{{ url('/delete_product') }}">Eliminar</a>
                    </td>
                </tr>
        
            </tbody>
        </table>
    </div>
@stop
