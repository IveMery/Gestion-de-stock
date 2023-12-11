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
        <a class="btn btn-info" href="{{ url('sucursales') }}">Ver sucursales</a>
        <a class="btn btn-success" href="{{ url('ventas') }}">Ventas</a>
        <a class="btn btn-warning" href="{{ url('detalles') }}">Detalles Venta</a>
        @if(session('success'))
            <div class="alert alert-success mt-3" id="successAlert" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(isset($productos) && count($productos) > 0)
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Sucursal</th>
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
                                @foreach ($producto->productosSucursales as $productoSucursal)
                                    {{ $productoSucursal->sucursal->sucursal_nombre }}
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('productos.edit', $producto->producto_id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg></a>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $producto->producto_id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <form id="deleteForm_{{ $producto->producto_id }}" action="{{ route('productos.destroy', $producto->producto_id) }}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="text-center mt-3">
            <p>No se encontraron productos</p>
            <img src="{{ asset('gifs/notfound.gif') }}" alt="GIF No se encontraron productos" class="img-fluid"/>
        </div>
        
        @endif

        <script>
            function confirmDelete(productoId) {
                Swal.fire({
                    title: 'Confirmar Eliminación',
                    text: '¿Estás seguro de que deseas eliminar este producto?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm_' + productoId).submit();
                    }
                });
            }

            setTimeout(function () {
                document.getElementById('successAlert').style.display = 'none';
            }, 3000);
        </script>
    </div>
@stop
