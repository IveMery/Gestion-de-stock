@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Listado de Ventas</h1>

        <a class="btn btn-primary"  href="{{ url('ventas/create') }}">Registrar nuevo venta</a>
        <a class="btn btn-secondary" href="{{ url('/sucursales') }}">Ver sucursales</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha de venta</th>
                    <th>Monto Total</th>
                    {{-- <th>Sucursal</th> --}}
                    <th>Nombre Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                    <tr>
                        <td>{{ $venta->venta_id }}</td>
                        <td>{{ $venta->venta_fecha }}</td>
                        <td>{{ $venta->venta_total }}</td>
                        <td>{{ $venta->cliente->cliente_nombre }}</td>
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