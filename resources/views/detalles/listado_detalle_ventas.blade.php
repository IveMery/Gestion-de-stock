@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Detalles Ventas</h1>

        <a class="btn btn-primary" href="{{ url('/register_product') }}">Registrar nuevo producto</a>
        <a class="btn btn-secondary" href="{{ url('/sucursales') }}">Ver sucursales</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Venta</th>
                    <th>Producto</th>
                    {{-- <th>Sucursal</th> --}}
                    <th>Creado</th>
                    <th>Actualizado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalles as $detalle)
                    <tr>
                        <th scope="row">{{ $detalle->detalleventa_id }}</th>
                        <td>{{ $detalle->venta_id }}</td>
                        <td>{{ $detalle->producto_id }}</td>
                        <td>{{ $detalle->created_at }}</td>
                        <td>{{ $detalle->updated_at }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('/update_product') }}">Editar</a>
                            <a class="btn btn-danger" href="{{ url('/delete_product') }}">Eliminar</a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@stop