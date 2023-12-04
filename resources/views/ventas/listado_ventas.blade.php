@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Listado de Ventas</h1>
        <a class="btn btn-primary" href="{{ url('ventas/create') }}">Registrar nueva venta</a>
        @if(session('success'))
        <div class="alert alert-success mt-3" id="successAlertVenta" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha de venta</th>
                    <th>Monto Total</th>
                    <th>Nombre Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->venta_id }}</td>
                        <td>{{ $venta->venta_fecha }}</td>
                        <td>{{ $venta->venta_total }}</td>
                        <td>{{ $venta->cliente->cliente_nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script> 
            setTimeout(function () {
                document.getElementById('successAlertVenta').style.display = 'none';
            }, 3000); 
        </script>
    </div>
@stop
