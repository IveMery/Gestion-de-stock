@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Listado de Sucursales</h2>
        @if (session('success'))
            <div class="alert alert-success mt-3 alertSucursal" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-3 alertSucursal" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sucursales as $sucursal)
                    <tr>
                        <td>{{ $sucursal->sucursal_nombre }}</td>
                        <td>{{ $sucursal->sucursal_direccion }}</td>
                        <td>
                            <a href="{{ route('sucursales.edit', $sucursal->sucursal_id) }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDelete('{{ $sucursal->sucursal_id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ url('/sucursales/create') }}" class="btn btn-success">Registrar Nueva Sucursal</a>

        <form id="deleteFormSucursal" action="{{ route('sucursales.destroy', $sucursal->sucursal_id) }}" method="POST"
            style="display: none;">
            @method('DELETE')
            @csrf
        </form>
    </div>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Confirmar Eliminación',
                text: '¿Estás seguro de que deseas eliminar esta sucursal?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteFormSucursal').submit();
                }
            });
        }
    </script>
    <script>
        setTimeout(function() {
            var alertElements = document.querySelectorAll('.alertSucursal');
            alertElements.forEach(function(element) {
                element.style.display = 'none';
            });
        }, 3000);
    </script>
@endsection
