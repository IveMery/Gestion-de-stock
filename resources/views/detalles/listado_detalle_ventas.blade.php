@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Detalles Ventas</h1>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Venta</th>
                    <th>Producto</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalles as $detalle)
                    <tr>
                        <th scope="row">{{ $detalle->detalleventa_id }}</th>
                        <td>{{ $detalle->venta_id }}</td>
                        <td>{{ $detalle->producto_id }}</td>
                        <td>{{ $detalle->created_at }}</td>
                        <td>{{ $detalle->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@stop
